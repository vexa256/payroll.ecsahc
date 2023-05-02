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
        \DB::statement("CREATE VIEW `constant_deductions_report_details` AS
       SELECT
           e.EmpID,
           dA.id,
           dA.ValidTo,
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
           cD.Deduction,
           cD.Description,
           cD.Amount AS Amount,
           CONCAT(SUBSTRING(MD5(RAND()), 1, 7)) AS payrollID
       FROM
           employees e
       JOIN
           deduction_assigned_to_staff dA
       ON
           e.EmpID = dA.EmpID
       JOIN
           constant_deductions cD
       ON
           dA.DID = cD.CDID
       WHERE
           dA.Type = 'constant' AND dA.valid = 'true' AND dA.ValidTo >= CURDATE();
       ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constant_deductions_report_details');
    }
};
