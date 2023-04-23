<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

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
        $d = DB::table('employees')
            ->where('EmpID', $request->EmpID)
            ->first();

        $data = [
            'Title'           => 'Select Staff Records | Only active contracts',
            'Desc'            => 'Let us set up the staff payroll for ' . $d->StaffName,
            'Page'            => 'Set.Set',
            'StaffName'       => $d->StaffName,
            'EmpID'           => $d->EmpID,
            'AssignedPayroll' => $d->AssignedPayroll,

        ];

        return view('scrn', $data);
    }

}
