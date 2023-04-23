<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\FormEngine;

class PayrollDataController extends Controller
{

    public function MgtConstantBenefits()
    {
        $FormEngine = new FormEngine();

        $rem = ['created_at', 'updated_at', 'id', 'CBID'];

        $constant_benefits = DB::table('constant_benefits')->get();

        $data = [
            'Title'        => 'Manage Payroll Constant Benefits',
            'Desc'         => 'Payroll Constant Benefits Database',
            'Page'         => 'ConstantBenefits.MgtConstantBenefits',
            'DatabaseData' => $constant_benefits,
            'FormEngine'   => $FormEngine,
            'rem'          => $rem,
            'Form'         => $FormEngine->Form('constant_benefits'),
        ];

        return view('scrn', $data);
    }
    public function MgtPercentageBenefits()
    {
        $FormEngine = new FormEngine();

        $rem = ['created_at', 'updated_at', 'id', 'PBID'];

        $percentage_benefits = DB::table('percentage_benefits')->get();

        $data = [
            'Title'        => 'Manage Payroll Percentage Benefits',
            'Desc'         => 'Payroll Percentage Benefits Database',
            'Page'         => 'PercentageBenefits.MgtPercentageBenefits',
            'DatabaseData' => $percentage_benefits,
            'FormEngine'   => $FormEngine,
            'rem'          => $rem,
            'Form'         => $FormEngine->Form('percentage_benefits'),
        ];

        return view('scrn', $data);
    }

    public function MgtPercentageDeductions()
    {
        $FormEngine = new FormEngine();

        $rem = ['created_at', 'updated_at', 'id', 'PDID'];

        $percentage_Deductions = DB::table('percentage_deductions')->get();

        $data = [
            'Title'        => 'Manage Payroll Percentage Deductions',
            'Desc'         => 'Payroll Percentage Deductions Database',
            'Page'         => 'PercentageDeductions.MgtPercentageDeductions',
            'DatabaseData' => $percentage_Deductions,
            'FormEngine'   => $FormEngine,
            'rem'          => $rem,
            'Form'         => $FormEngine->Form('percentage_deductions'),
        ];

        return view('scrn', $data);
    }

    public function MgtConstantDeductions()
    {
        $FormEngine = new FormEngine();

        $rem = ['created_at', 'updated_at', 'id', 'CDID'];

        $Constant_Deductions = DB::table('constant_deductions')->get();

        $data = [
            'Title'        => 'Manage Payroll Constant Deductions',
            'Desc'         => 'Payroll Constant Deductions Database',
            'Page'         => 'ConstantDeductions.MgtConstantDeductions',
            'DatabaseData' => $Constant_Deductions,
            'FormEngine'   => $FormEngine,
            'rem'          => $rem,
            'Form'         => $FormEngine->Form('constant_deductions'),
        ];

        return view('scrn', $data);
    }

    public function MgtTaxes()
    {
        $FormEngine = new FormEngine();

        $rem = ['created_at', 'updated_at', 'id', 'TID'];

        $taxes = DB::table('taxes')->get();

        $data = [
            'Title'        => 'Manage Payroll Taxes',
            'Desc'         => 'Payroll Taxes Database',
            'Page'         => 'Taxes.MgtTaxes',
            'DatabaseData' => $taxes,
            'FormEngine'   => $FormEngine,
            'rem'          => $rem,
            'Form'         => $FormEngine->Form('taxes'),
        ];

        return view('scrn', $data);
    }
}
