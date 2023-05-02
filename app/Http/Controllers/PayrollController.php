<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\FormEngine;
use App\Http\Controllers\PayrollReportsController;

class PayrollController extends Controller
{
    public function PayrollSelectPayroll()
    {
        $DatabaseData = DB::table('payroll_labels')->get();

        $data = [
            'Title'        => 'Select Payroll To Manage',
            'Desc'         => 'Payroll Selection | Select payroll whose settings are required',
            'Page'         => 'Set.SelectPayroll',
            'DatabaseData' => $DatabaseData,

        ];

        return view('scrn', $data);
    }

    public function PayrollSelectStaff(Request $request)
    {
        $Employees = DB::table('employees')
            ->where('RecordStatus', 'Contract Active')
            ->where('AssignedPayroll', $request->PayrollID)
            ->get();

        if ($Employees->count() < 1) {

            return redirect()->back()->with('error_a', "No records found");
        }

        $data = [
            'Title'     => 'Select Staff Records',
            'Desc'      => 'Select staff member to attach payroll data to',
            'Page'      => 'Set.SelectStaff',
            'Employees' => $Employees,

        ];

        return view('scrn', $data);
    }

    public function SetPayroll(Request $request)
    {

        $Rep        = new PayrollReportsController;
        $FormEngine = new FormEngine();

        $rem = ['EmpID', 'TID', 'id', 'PerecentageOfSalaryAffected', 'Designation', 'DepartmentID', 'ClusterID', 'payrollID', 'JoiningDate', 'created_at', 'updated_at', 'valid', 'DID', 'Type', 'BID', 'Taxable', 'Email', 'PhoneNumber'];

        $d = DB::table('employees')
            ->where('EmpID', $request->EmpID)
            ->first();

        $constant_deductions = DB::table('constant_deductions')
            ->get();

        $percentage_deductions = DB::table('percentage_deductions')
            ->get();

        $constant_benefits = DB::table('constant_benefits')->get();

        $percentage_benefits = DB::table('percentage_benefits')->get();

        $taxes_assigned_to_staff = DB::table('taxes_assigned_to_staff')->get();
        $taxes                   = DB::table('taxes')->get();

        $payroll = DB::table('employee_payroll_report_view')->where('EmpID', $d->EmpID)->get();

        $data = [
            'Title'                                => 'Select Staff Records | Only active contracts',
            'Desc'                                 => 'Let us set up the staff payroll for ' . $d->StaffName,
            'Page'                                 => 'Set.Set',
            'StaffName'                            => $d->StaffName,
            'EmpID'                                => $d->EmpID,
            'AssignedPayroll'                      => $d->AssignedPayroll,
            'constant_deductions'                  => $constant_deductions,
            'percentage_deductions'                => $percentage_deductions,
            'percentage_benefits'                  => $percentage_benefits,
            'constant_benefits'                    => $constant_benefits,
            'taxes'                                => $taxes,
            'rem'                                  => $rem,
            'TForm'                                => $FormEngine->Form('taxes_assigned_to_staff'),
            'CDForm'                               => $FormEngine->Form('deduction_assigned_to_staff'),
            'BForm'                                => $FormEngine->Form('benefits_assigned_to_staff'),
            'constant_benefits_report_details'     => $Rep->constant_benefits_report_details($d->EmpID),
            'employee_payroll_report_view'         => $payroll,
            'constant_benefits_report_view'        => $Rep->constant_benefits_report_view($d->EmpID),
            'constant_deductions_report_details'   => $Rep->constant_deductions_report_details($d->EmpID),
            'constant_deductions_report_view'      => $Rep->constant_deductions_report_view($d->EmpID),
            'percentage_deductions_report_details' => $Rep->percentage_deductions_report_details($d->EmpID),
            'percentage_deductions_report_view'    => $Rep->percentage_deductions_report_view($d->EmpID),
            'percentage_benefits_report'           => $Rep->percentage_benefits_report($d->EmpID),
            'percentage_benefits_report_details'   => $Rep->percentage_benefits_report_details($d->EmpID),
            'tax_report_view'                      => $Rep->tax_report_view($d->EmpID),

        ];

        return view('scrn', $data);
    }

    public function AddTax(Request $request)
    {

        $counter = DB::table('taxes_assigned_to_staff')->where('TID', $request->TID)
            ->where('EmpID', $request->EmpID)
            ->count();

        // dd($counter);

        if ($counter > 0) {

            return redirect()->back()->with('error_a', 'This staff member has already been assigned this payroll entity');
        }

        $validatedData = $request->validate([
            // 'TID'       => 'unique:taxes_assigned_to_staff',
            'ValidFrom' => 'required|date',
            'ValidTo'   => 'required|date|after:ValidFrom',
        ]);

        // $data = ;

        // Perform a mass insert into the 'taxes_assigned_to_staff' table
        DB::table('taxes_assigned_to_staff')->insert($request->except('_token', 'TableName', 'id'));

        return redirect()->back()->with('status', 'The selected tax has been assigned to staff member\'s payroll sucessfully');

    }

    public function AddCD(Request $request)
    {

        $counter = DB::table('deduction_assigned_to_staff')->where('DID', $request->DID)
            ->where('EmpID', $request->EmpID)
            ->count();

        if ($counter > 0) {

            return redirect()->back()->with('error_a', 'This staff member has already been assigned this payroll entity');
        }

        $validatedData = $request->validate([

            'ValidFrom' => 'required|date',
            'ValidTo'   => 'required|date|after:ValidFrom',
        ]);

        // $d                = $request->all();
        // $d['AmountInUsd'] = $request->Amount;

        // $request->merge($d);

        $data = $request->except('_token', 'TableName', 'id');

        // Perform a mass insert into the 'taxes_assigned_to_staff' table
        DB::table('deduction_assigned_to_staff')->insert($data);

        return redirect()->back()->with('status', 'The selected constant deduction has been assigned to staff member\'s payroll sucessfully');

    }

    public function AddCB(Request $request)
    {

        $counter = DB::table('benefits_assigned_to_staff')->where('BID', $request->BID)
            ->where('EmpID', $request->EmpID)
            ->count();

        if ($counter > 0) {

            return redirect()->back()->with('error_a', 'This staff member has already been assigned this payroll entity');
        }

        $validatedData = $request->validate([

            'ValidFrom' => 'required|date',
            'ValidTo'   => 'required|date|after:ValidFrom',
        ]);

        // $d                = $request->all();
        // $d['AmountInUsd'] = $request->Amount;

        // $request->merge($d);

        $data = $request->except('_token', 'TableName', 'id');

        DB::table('benefits_assigned_to_staff')->insert($data);

        return redirect()->back()->with('status', 'The selected constant benefit has been assigned to staff member\'s payroll sucessfully');

    }
}
