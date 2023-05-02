<?php
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePayrollReportView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('
            CREATE VIEW employee_payroll_report_view AS
            SELECT
                e.EmpID,
                e.StaffName,
                e.EmployeeType,
                cb.TotalConstantBenefits,
                cd.TotalConstantDeductions,
                pb.TotalBenefits AS TotalPercentageBenefits,
                pd.TotalPercentageDeductions,
                tx.TotalTax,
                (e.BasicSalaryPerMonthInUsd + COALESCE(cb.TotalConstantBenefits, 0) + COALESCE(pb.TotalBenefits, 0)) AS GrossSalary,
                (e.BasicSalaryPerMonthInUsd + COALESCE(cb.TotalConstantBenefits, 0) + COALESCE(pb.TotalBenefits, 0)
                 - COALESCE(cd.TotalConstantDeductions, 0) - COALESCE(pd.TotalPercentageDeductions, 0) - COALESCE(tx.TotalTax, 0)) AS NetSalary
            FROM employees e
            LEFT JOIN constant_benefits_report_view cb ON e.EmpID = cb.EmpID
            LEFT JOIN constant_deductions_report_view cd ON e.EmpID = cd.EmpID
            LEFT JOIN percentage_benefits_report pb ON e.EmpID = pb.EmpID
            LEFT JOIN percentage_deductions_report_view pd ON e.EmpID = pd.EmpID
            LEFT JOIN taxes_report_view tx ON e.EmpID = tx.EmpID;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS employee_payroll_report_view');
    }
}