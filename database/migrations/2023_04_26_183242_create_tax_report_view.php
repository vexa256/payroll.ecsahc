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
        \DB::statement("CREATE VIEW tax_report_view AS
      SELECT
          e.EmpID,
          tas.id,
          tas.ValidTo,
          e.StaffName,
          e.ClusterID,
          e.BasicSalaryPerMonthInUsd,
          e.EmployeeType,
          CONCAT(SUBSTRING(MD5(RAND()) FROM 1 FOR 7)) AS payrollID,
          SUM(t.TaxPercentage * (e.BasicSalaryPerMonthInUsd + COALESCE(cb_total, 0) + COALESCE(pb_total, 0)) / 100) AS TotalTaxAmount
      FROM
          employees e
      JOIN
          taxes_assigned_to_staff tas ON e.EmpID = tas.EmpID
      JOIN
          taxes t ON tas.TID = t.TID
      LEFT JOIN (
          SELECT
              bas.EmpID,
              SUM(cb.Amount) as cb_total
          FROM
              benefits_assigned_to_staff bas
              LEFT JOIN constant_benefits cb ON bas.BID = cb.CBID
          WHERE
              bas.Type = 'constant' AND bas.Taxable = 'true' AND bas.ValidTo >= NOW()
          GROUP BY
              bas.EmpID
      ) cb_data ON e.EmpID = cb_data.EmpID
      LEFT JOIN (
          SELECT
              bas.EmpID,
              SUM(pb.PercentageOfSalary * e.BasicSalaryPerMonthInUsd / 100) as pb_total
          FROM
              benefits_assigned_to_staff bas
              LEFT JOIN percentage_benefits pb ON bas.BID = pb.PBID
              JOIN employees e ON bas.EmpID = e.EmpID
          WHERE
              bas.Type = 'percentage' AND bas.Taxable = 'true' AND bas.ValidTo >= NOW()
          GROUP BY
              bas.EmpID
      ) pb_data ON e.EmpID = pb_data.EmpID
      GROUP BY
          e.EmpID, tas.id;
      ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_report_view');
    }
};
