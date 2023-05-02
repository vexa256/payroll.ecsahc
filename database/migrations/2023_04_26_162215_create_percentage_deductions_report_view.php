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
        \DB::statement("CREATE VIEW `percentage_deductions_report_view` AS
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
            SUM(pD.PercentageOfSalary * e.BasicSalaryPerMonthInUsd / 100) AS TotalPercentageDeductions,
            CONCAT(SUBSTRING(MD5(RAND()), 1, 7)) AS payrollID
        FROM
            employees e
        JOIN
            deduction_assigned_to_staff dA
        ON
            e.EmpID = dA.EmpID
        JOIN
            percentage_deductions pD
        ON
            dA.DID = pD.PDID
        WHERE
            dA.Type = 'percentage' AND dA.valid = 'true' AND dA.ValidTo >= CURDATE()
        GROUP BY
            e.EmpID;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percentage_deductions_report_view');
    }
};
