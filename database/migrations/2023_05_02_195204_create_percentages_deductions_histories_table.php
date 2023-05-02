<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('percentages_deductions_histories', function (Blueprint $table) {
            $table->string('EmpID', 255);
            $table->id();
            $table->string('PayrollID', 255);
            $table->string('Year', 255);
            $table->string('Month', 255);
            $table->string('StaffName', 255);
            $table->string('PhoneNumber', 255);
            $table->string('Email', 255);
            $table->string('EmployeeType', 255)->default('');
            $table->string('Designation', 255);
            $table->string('DepartmentID', 255)->nullable();
            $table->string('ClusterID', 255);
            $table->decimal('BasicSalaryPerMonthInUsd', 30, 2);
            $table->date('JoiningDate');
            $table->date('ContractExpiry');
            // $table->string('PDID', 255);
            $table->string('Deduction', 255);
            $table->decimal('PercentageOfSalary', 30, 2);
            $table->decimal('DeductionAmount', 64, 8)->nullable();
            $table->date('ValidFrom');
            $table->date('ValidTo');
            $table->string('payrollID', 7)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percentages_deductions_histories');
    }
};
