<?php

namespace App\Http\Controllers;

use DB;
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
    }

    public function MgtEmp()
    {
        $Roles    = DB::table('staff_roles')->get();
        $Payrolls = DB::table('payroll_labels')->get();

        $Employees = DB::table('employees AS E')
            ->join('staff_roles AS R', 'R.RoleID', 'E.RoleID')
            ->join('clusters AS C', 'R.ClusterID', 'C.ClusterID')
            ->join('departments AS D', 'D.DepartmentID', 'C.DepartmentID')
            ->join('payroll_labels AS P', 'P.PayrollID', 'E.AssignedPayroll')
            ->where('E.RecordStatus', 'Contract Active')
            ->select('E.*', 'P.PayrollID', 'PayrollName', 'D.DepartmentName', 'C.ClusterName', 'R.StaffRole', 'R.RoleID')
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
            'Title'     => 'Attach beneficiaries to the staff member '.$StaffMember->StaffName,
            'Desc'      => 'Mamange Staff beneficiary settings for '.$StaffMember->StaffName,
            'Page'      => 'Beneficiary.MgtBeneficiary',
            'DatabaseData' => $DatabaseData,
            'rem'        => $rem,
            'StaffName'        => $StaffMember->StaffName,
            'EmpID'        => $StaffMember->EmpID,
            'Form'       => $FormEngine->Form('staff_beneficiaries'),

        ];

        return view('scrn', $data);
    }
}
