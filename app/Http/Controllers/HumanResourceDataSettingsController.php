<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\FormEngine;

class HumanResourceDataSettingsController extends Controller
{

    public function MgtDepts()
    {
        $FormEngine = new FormEngine();

        $rem = ['DepartmentID', 'created_at', 'updated_at', 'id'];

        $Departments = DB::table('departments')->get();

        $data = [
            'Title'       => 'Organization Department Settings',
            'Desc'        => 'Manage all your departments',
            'Page'        => 'Departments.MgtDepts',
            'Departments' => $Departments,
            'FormEngine'  => $FormEngine,
            'rem'         => $rem,
            'Form'        => $FormEngine->Form('departments'),
        ];

        return view('scrn', $data);
    }

    public function MgtClusters()
    {
        $FormEngine = new FormEngine();

        $rem = ['DepartmentID', "ClusterID", 'created_at', 'updated_at', 'id'];

        $Departments = DB::table('departments')->get();
        $Clusters    = DB::table('clusters AS C')
            ->join('departments AS D', 'C.DepartmentID', 'D.DepartmentID')
            ->select('C.*', 'D.DepartmentName')
            ->get();

        $data = [
            'Title'       => 'Organization Cluster Settings',
            'Desc'        => 'Manage all your clusters for ECSA-HC',
            'Page'        => 'Clusters.MgtClusters',
            'Departments' => $Departments,
            'Clusters'    => $Clusters,
            'FormEngine'  => $FormEngine,
            'rem'         => $rem,
            'Form'        => $FormEngine->Form('clusters'),
        ];

        return view('scrn', $data);
    }

    public function MgtStaffRoles()
    {
        $FormEngine = new FormEngine();

        $rem = ['DepartmentID', "ClusterID", "RoleID", 'created_at', 'updated_at', 'id'];

        $Clusters = DB::table('clusters')->get();

        $Roles = DB::table('staff_roles AS S')
            ->join('clusters AS C', 'C.ClusterID', 'S.ClusterID')
            ->join('departments AS D', 'D.DepartmentID', 'C.DepartmentID')
            ->select('S.*', 'D.DepartmentName', 'C.ClusterName')
            ->get();

        $data = [
            'Title'      => 'Organization Cluster Settings',
            'Desc'       => 'Manage all your staff roles for ECSA-HC',
            'Page'       => 'StaffRoles.MgtRoles',
            'Clusters'   => $Clusters,
            'Roles'      => $Roles,
            'FormEngine' => $FormEngine,
            'rem'        => $rem,
            'Form'       => $FormEngine->Form('staff_roles'),
        ];

        return view('scrn', $data);
    }

    public function MgtPayrollLabels()
    {
        $FormEngine = new FormEngine();

        $rem = ['PayrollID', 'created_at', 'updated_at', 'id'];

        $Labels = DB::table('payroll_labels')->get();

        $data = [
            'Title'      => 'Organization Payroll Labels Settings',
            'Desc'       => 'Manage all your Payroll Labels for ECSA-HC',
            'Page'       => 'PayrollLabels.MgtPayrollLabels',
            'Labels'     => $Labels,
            'FormEngine' => $FormEngine,
            'rem'        => $rem,
            'Form'       => $FormEngine->Form('payroll_labels'),
        ];

        return view('scrn', $data);
    }
}
