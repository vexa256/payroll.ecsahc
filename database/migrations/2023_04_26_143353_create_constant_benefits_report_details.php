<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \DB::statement("
        CREATE VIEW `constant_benefits_report_details` AS
        SELECT
            e.EmpID,
            bA.id,
            bA.ValidTo,
            e.StaffName,
            e.PhoneNumber,
            e.Email,
            e.EmployeeType,
            e.Designation,
            e.DepartmentID,
            e.ClusterID,
            e.BasicSalaryPerMonthInUsd,
            e.JoiningDate,
            e.ContractExpiry,
            cB.Benefit,
            cB.Description,
            cB.Amount,
            CONCAT(SUBSTRING(MD5(RAND()), 1, 7)) AS payrollID
        FROM
            employees e
        JOIN
            benefits_assigned_to_staff bA
        ON
            e.EmpID = bA.EmpID
        JOIN
            constant_benefits cB
        ON
            bA.BID = cB.CBID
        WHERE
            bA.Type = 'constant' AND bA.valid = 'true' AND bA.ValidTo >= CURDATE();
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constant_benefits_report_details');
    }
};
