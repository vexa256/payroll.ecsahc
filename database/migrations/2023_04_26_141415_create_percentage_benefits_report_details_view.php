<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW `percentage_benefits_report_details` AS
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
                pB.Benefit,
                pB.Description,
                pB.PercentageOfSalary,
                (pB.PercentageOfSalary * e.BasicSalaryPerMonthInUsd / 100) AS BenefitAmount
            FROM
                employees e
            JOIN
                benefits_assigned_to_staff bA
            ON
                e.EmpID = bA.EmpID
            JOIN
                percentage_benefits pB
            ON
                bA.BID = pB.PBID
            WHERE
                bA.Type = 'percentage' AND bA.valid = 'true' AND bA.ValidTo >= CURDATE();
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percentage_benefits_report_details_view');
    }
};
