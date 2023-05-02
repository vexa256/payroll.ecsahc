<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreatePercentageBenefitsReportView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW `percentage_benefits_report` AS
            SELECT
                bA.id,
                bA.ValidTo,
                e.EmpID,
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
                CONCAT(SUBSTRING(MD5(RAND()), 1, 7)) AS payrollID,
                SUM(pB.PercentageOfSalary * e.BasicSalaryPerMonthInUsd / 100) AS TotalBenefits
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
                bA.Type = 'percentage' AND bA.valid = 'true' AND bA.ValidTo >= CURDATE()
            GROUP BY
                e.EmpID;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `percentage_benefits_report`;");
    }
}
