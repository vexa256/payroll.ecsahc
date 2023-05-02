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
        Schema::create('payroll_histories', function (Blueprint $table) {
            $table->string('EmpID', 255);
            $table->id();
            $table->string('PayrollID', 255);
            $table->string('Year', 255);
            $table->string('Month', 255);
            $table->string('StaffName', 255);
            $table->string('EmployeeType', 255);
            $table->decimal('TotalConstantBenefits', 52, 2)->nullable();
            $table->decimal('TotalConstantDeductions', 52, 2)->nullable();
            $table->decimal('TotalPercentageBenefits', 65, 8)->nullable();
            $table->decimal('TotalPercentageDeductions', 65, 8)->nullable();
            $table->decimal('TotalTax', 65, 14)->nullable();
            $table->decimal('GrossSalary', 65, 8)->default(0.0);
            $table->decimal('NetSalary', 65, 14)->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_histories');
    }
};
