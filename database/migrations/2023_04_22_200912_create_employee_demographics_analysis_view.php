<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDemographicsAnalysisView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW employee_demographics_analysis AS
        SELECT
        GROUP_CONCAT(id) AS id,
        Nationality,
        COUNT(*) AS NationalityCount,
        Gender,
        SUM(CASE WHEN Gender = 'Male' THEN 1 ELSE 0 END) AS MaleCount,
        SUM(CASE WHEN Gender = 'Female' THEN 1 ELSE 0 END) AS FemaleCount,
        CASE
            WHEN FLOOR(DATEDIFF(CURDATE(), DOB) / 365) BETWEEN 18 AND 29 THEN '18-29'
            WHEN FLOOR(DATEDIFF(CURDATE(), DOB) / 365) BETWEEN 30 AND 39 THEN '30-39'
            WHEN FLOOR(DATEDIFF(CURDATE(), DOB) / 365) BETWEEN 40 AND 49 THEN '40-49'
            WHEN FLOOR(DATEDIFF(CURDATE(), DOB) / 365) BETWEEN 50 AND 59 THEN '50-59'
            ELSE '60+'
        END AS AgeGroup,
        COUNT(*) AS EmployeeCount
    FROM
        employees
    GROUP BY
        Nationality, Gender, AgeGroup
    ORDER BY
        Nationality, Gender, AgeGroup;

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS employee_demographics_analysis");
    }
}
