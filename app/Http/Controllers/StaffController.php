<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{

    public function __construct()
    {
        $employees = DB::table('contract_expiry_report')->get();

        // Update the SoonExpiring column in the employees table for each employee
        foreach ($employees as $employee) {
            if ($employee->SoonExpiringStatus) {
                DB::table('employees')
                    ->where('StaffName', $employee->StaffName)
                    ->where('PhoneNumber', $employee->PhoneNumber)
                    ->where('Email', $employee->Email)
                    ->update(['SoonExpiring' => 'true']);
            }
        }

        $employees = DB::table('employees')
            ->where('RecordStatus', '=', 'Contract Expired')
            ->where('ContractExpiry', '>', Carbon::now())
            ->get();

        foreach ($employees as $employee) {
            $expiryDate      = Carbon::parse($employee->ContractExpiry);
            $daysUntilExpiry = $expiryDate->diffInDays(Carbon::now());

            $updateData = ['RecordStatus' => 'Contract Active'];
            if ($daysUntilExpiry <= 90) {
                $updateData['SoonExpiring'] = 'true';
            }

            DB::table('employees')
                ->where('id', $employee->id)
                ->update($updateData);
        }

    }

    public function MgtEmp()
    {
        $Roles    = DB::table('staff_roles')->get();
        $Payrolls = DB::table('payroll_labels')->get();

        $Employees = DB::table('employees AS E')
            ->join('staff_roles AS R', 'R.RoleID', 'E.RoleID')
            ->join('clusters AS C', 'R.ClusterID', 'C.ClusterID')
        // ->join('departments AS D', 'D.DepartmentID', 'C.DepartmentID')
            ->join('payroll_labels AS P', 'P.PayrollID', 'E.AssignedPayroll')
            ->where('E.RecordStatus', 'Contract Active')
            ->select('E.*', 'P.PayrollID', 'PayrollName', 'C.ClusterName', 'R.StaffRole', 'R.RoleID')
            ->get();

        // dd($Employees);

        $Clusters = DB::table('clusters')->get();

        $FormEngine = new FormEngine();

        $rem = [
            'IDScan',
            'DepartmentID',
            'AssignedPayroll',
            'uuid',
            'ClusterID',
            'RoleID',
            'ReportsToRoleID',
            'ReportsTo',
            'GrossSalary',
            'Gender',
            'HOD',
            'MonthsToExpiry',
            'EmpID',
            'StaffPhoto',
            'PromotionStatus',
            'created_at',
            'updated_at',
            'EmployeeType',
            'RecordStatus',
            'Designation',
            'id',
            'IDScan',
            'Gender',
            'SoonExpiring',
        ];

        $data = [
            'Title'     => 'Staff records database | Only active contracts',
            'Desc'      => 'ECSA-HC Staff Database | Refer to staff documentation for uploaded documents',
            'Page'      => 'Employees.MgtEmp',
            'Clusters'  => $Clusters,
            'Employees' => $Employees,
            'Payrolls'  => $Payrolls,
            'rem'       => $rem,
            'Roles'     => $Roles,
            'Form'      => $FormEngine->Form('employees'),
        ];

        return view('scrn', $data);
    }

    public function EndContract($id)
    {

        DB::table('employees')->where('id', $id)->update([
            'RecordStatus' => "Contract Ended",
        ]);

        return redirect()
            ->back()
            ->with('status', 'The selected staff contract was ended successfully');

    }

    public function ExtendContract(Request $request)
    {
        $rules = [
            '*' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        DB::table('employees')->where('id', $request->id)->update([
            'ContractExpiry' => $request->ContractExpiry,
        ]);

        return redirect()
            ->back()
            ->with('status', 'The selected staff contract was ended successfully');

    }

    public function SelectSelectStaffMemberBeneficiary()
    {
        $Employees = DB::table('employees')
            ->where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title'     => 'Select Staff Records | Only active contracts',
            'Desc'      => 'Staff beneficiary settings',
            'Page'      => 'Beneficiary.SelectEmployee',
            'Employees' => $Employees,

        ];

        return view('scrn', $data);
    }

    public function AcceptSelectStaffMemberBeneficiary(Request $request)
    {
        $rules = [
            '*' => 'required',

        ];

        $FormEngine = new \App\Http\Controllers\FormEngine();

        $rem = ['DepartmentID', "ClusterID", "IDType", 'PdfIdScan', 'Gender', "RoleID", 'created_at', 'updated_at', 'id', 'EmpID'];

        $validator = Validator::make($request->all(), $rules);

        $StaffMember = DB::table('employees')->where('EmpID', $request->EmpID)->first();

        $DatabaseData = DB::table('staff_beneficiaries')->where('EmpID', $request->EmpID)->get();

        $data = [
            'Title'        => 'Attach beneficiaries to the staff member ' . $StaffMember->StaffName,
            'Desc'         => 'Mamange Staff beneficiary settings for ' . $StaffMember->StaffName,
            'Page'         => 'Beneficiary.MgtBeneficiary',
            'DatabaseData' => $DatabaseData,
            'rem'          => $rem,
            'StaffName'    => $StaffMember->StaffName,
            'EmpID'        => $StaffMember->EmpID,
            'Form'         => $FormEngine->Form('staff_beneficiaries'),

        ];

        return view('scrn', $data);
    }

    public function SelectStaffForBenefits()
    {
        $Employees = DB::table('employees')
            ->where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title'     => 'Select Staff Records | Only active contracts',
            'Desc'      => 'Staff non salary benefits settings',
            'Page'      => 'StaffNonSalaryBenefits.SelectEmployee',
            'Employees' => $Employees,

        ];

        return view('scrn', $data);

    }

    public function MgtStaffBenefits(Request $request)
    {

        $rules = [
            '*' => 'required',

        ];

        $FormEngine = new \App\Http\Controllers\FormEngine();

        $rem = ['DepartmentID', "ClusterID", "IDType", 'PdfIdScan', 'Gender', "RoleID", 'created_at', 'updated_at', 'id', 'EmpID'];

        $validator = Validator::make($request->all(), $rules);

        $Employee = DB::table('employees')->where('EmpID', $request->EmpID)->first();

        $staff_non_salary_benefits = DB::table('staff_non_salary_benefits AS B')
            ->join('employees AS E', 'E.EmpID', 'B.EmpID')
            ->where('E.RecordStatus', 'Contract Active')
            ->where('E.EmpID', $request->EmpID)
            ->select('E.StaffName', 'B.*')
            ->get();

        $data = [
            'Title'        => 'Manage Staff Records | Only active contracts',
            'Desc'         => 'Manage beneficiary settings',
            'Page'         => 'StaffNonSalaryBenefits.MgtStaffNonSalaryBenefits',
            'DatabaseData' => $staff_non_salary_benefits,
            'rem'          => $rem,
            'StaffName'    => $Employee->StaffName,
            'EmpID'        => $Employee->EmpID,
            'Form'         => $FormEngine->Form('staff_non_salary_benefits'),

        ];

        return view('scrn', $data);
    }

    public function StaffContractValidity()
    {

        $rem = ['DepartmentID', "ClusterID", "IDType", 'PdfIdScan', 'Gender', "RoleID", 'created_at', 'updated_at', 'id', 'EmpID'];

        $staff_non_salary_benefits = DB::table('contract_expiry_report')->get();

        $data = [
            'Title'        => 'Staff Contract Validity ',
            'Desc'         => 'Contract Validity Report',
            'Page'         => 'ContractExpiryReport.MgtContractExpiryReport',
            'DatabaseData' => $staff_non_salary_benefits,
            "rem"          => $rem,

        ];

        return view('scrn', $data);
    }

    public function StaffDemographics()
    {

        $rem = ['DepartmentID', "ClusterID", "IDType", 'PdfIdScan', 'Gender', "RoleID", 'created_at', 'updated_at', 'id', 'EmpID'];

        $staff_non_salary_benefits = DB::table('employee_demographics_analysis')->get();

        $data = [
            'Title'        => 'Staff Demographics Report ',
            'Desc'         => 'Demographics Analysis',
            'Page'         => 'Reports.Demographics',
            'DatabaseData' => $staff_non_salary_benefits,
            "rem"          => $rem,

        ];

        return view('scrn', $data);
    }

    public function SoonExpiringContracts()
    {
        $rem = ['DepartmentID', "ClusterID", "IDType", 'PdfIdScan', 'Gender', "RoleID", 'created_at', 'updated_at', 'id', 'EmpID'];

        $contract_expiries = DB::table('soon_expiring_contracts')
        // ->where('SoonExpiring', 'true')
            ->get();

        $data = [
            'Title'        => 'Soon Expiry Report',
            'Desc'         => 'Soon Expiring Staff Contract Expiry',
            'Page'         => 'Reports.SoonExpiringContracts',
            'DatabaseData' => $contract_expiries,
            "rem"          => $rem,

        ];

        return view('scrn', $data);
    }
    public function ExpiredContracts()
    {

        $rem = ['DepartmentID', "ClusterID", "IDType", 'PdfIdScan', 'Gender', "RoleID", 'created_at', 'updated_at', 'id', 'EmpID'];

        $contract_expiries = DB::table('contract_expiries')->get();

        $data = [
            'Title'        => 'Contract Expiry Report',
            'Desc'         => 'Staff Contract Expiry | Expired Staff Contracts',
            'Page'         => 'Reports.ExpiredContracts',
            'DatabaseData' => $contract_expiries,
            "rem"          => $rem,

        ];

        return view('scrn', $data);
    }

    public function StaffDocsSelect()
    {
        $Employees = DB::table('employees')
        // ->where('RecordStatus')
            ->get();

        $data = [
            'Title'     => 'Select Staff Member | Only active contracts',
            'Desc'      => 'Staff documentation settings',
            'Page'      => 'StaffDocs.SelectStaff',
            'Employees' => $Employees,

        ];

        return view('scrn', $data);
    }

    public function MgtStaffDocs(Request $request)
    {
        $rules = [
            '*' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        $E = DB::table('employees')->where('EmpID', $request->EmpID)->first();

        // dd($E);

        $Employees = DB::table('employees AS E')
            ->join('staff_docs AS D', 'D.EmpID', 'E.EmpID')
            ->where('E.EmpID', $request->EmpID)
            ->select('D.*', 'E.StaffName')

        // ->where('RecordStatus')
            ->get();

        $FormEngine = new \App\Http\Controllers\FormEngine();

        $rem = ['DepartmentID', "ClusterID", "StaffName", "IDType", 'PdfIdScan', 'Gender', "RoleID", 'created_at', 'updated_at', 'id', 'EmpID', 'DocURL', 'DOCID', 'Department'];

        $data = [
            'Title'        => 'Manage Staff Member Documentation',
            'Desc'         => 'Staff documentation data for ' . $E->StaffName,
            'Page'         => 'StaffDocs.MgtStaffDocs',
            'DatabaseData' => $Employees,
            'rem'          => $rem,
            'StaffName'    => $E->StaffName,
            'EmpID'        => $E->EmpID,
            'Form'         => $FormEngine->Form('staff_docs'),

        ];

        return view('scrn', $data);
    }

}
