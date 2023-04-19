<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    public function VirtualOffice()
    {

        // $Projects = DB::table('projects')->get();

        $data = [
            'Title' => 'ECSA-HC HR and Payroll System',
            'Desc'  => 'Virtual Office Dashboard',

        ];

        return view('scrn', $data);
    }
}