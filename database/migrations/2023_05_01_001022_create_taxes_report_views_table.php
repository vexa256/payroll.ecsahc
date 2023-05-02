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
        \DB::statement(" CREATE VIEW taxes_report_view AS
        SELECT
          e.EmpID,
          e.StaffName,
          e.EmployeeType,
          tas.id,
          e.BasicSalaryPerMonthInUsd,
          SUM(IF(ba.Type = 'constant' AND ba.Taxable = 'true', cb.Amount, 0)) AS ConstantTaxableBenefits,
          SUM(IF(ba.Type = 'percentage' AND ba.Taxable = 'true', pb.PercentageOfSalary * e.BasicSalaryPerMonthInUsd / 100, 0)) AS PercentageTaxableBenefits,
          SUM(IF(ba.Type = 'constant' AND ba.Taxable = 'true', cb.Amount, 0)) +
          SUM(IF(ba.Type = 'percentage' AND ba.Taxable = 'true', pb.PercentageOfSalary * e.BasicSalaryPerMonthInUsd / 100, 0)) AS TotalTaxableBenefits,
          SUM(tax.TaxPercentage * (e.BasicSalaryPerMonthInUsd +
            IF(ba.Type = 'constant' AND ba.Taxable = 'true', cb.Amount, 0) +
            IF(ba.Type = 'percentage' AND ba.Taxable = 'true', pb.PercentageOfSalary * e.BasicSalaryPerMonthInUsd / 100, 0)
          ) / 100) AS TotalTax
        FROM employees e
        LEFT JOIN benefits_assigned_to_staff ba ON e.EmpID = ba.EmpID AND ba.ValidTo >= CURDATE()
        LEFT JOIN constant_benefits cb ON ba.BID = cb.CBID
        LEFT JOIN percentage_benefits pb ON ba.BID = pb.PBID
        LEFT JOIN taxes_assigned_to_staff tas ON e.EmpID = tas.EmpID AND tas.ValidTo >= CURDATE()
        LEFT JOIN taxes tax ON tas.TID = tax.TID
        GROUP BY e.EmpID, e.StaffName, e.EmployeeType, tas.id, e.BasicSalaryPerMonthInUsd;




        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes_report_view');
    }
};
