<?php

namespace App\Http\Controllers;

use DB;

class PayrollReportsController extends Controller
{
    public function percentage_benefits_report($EmpID)
    {
        $data = DB::table('percentage_benefits_report')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function percentage_benefits_report_details($EmpID)
    {
        $data = DB::table('percentage_benefits_report_details')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function constant_benefits_report_details($EmpID)
    {
        $data = DB::table('constant_benefits_report_details')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function constant_benefits_report_view($EmpID)
    {
        $data = DB::table('constant_benefits_report_view')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function constant_deductions_report_details($EmpID)
    {
        $data = DB::table('constant_deductions_report_details')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function constant_deductions_report_view($EmpID)
    {
        $data = DB::table('constant_deductions_report_view')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function percentage_deductions_report_details($EmpID)
    {
        $data = DB::table('percentage_deductions_report_details')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function percentage_deductions_report_view($EmpID)
    {
        $data = DB::table('percentage_deductions_report_view')->where('EmpID', $EmpID)->get();

        return $data;
    }

    public function tax_report_view($EmpID)
    {
        $data = DB::table('taxes_report_view')->where('EmpID', $EmpID)->get();

        return $data;
    }
}