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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('StaffName')->unique();
            $table->string('HOD')->default('false');
            $table->string('AssignedPayroll');
            $table->string('PhoneNumber')->unique();
            $table->string('EmployeeType')->default('International Staff');
            $table->string('Email')->unique();
            $table->string('LocalAddress');
            $table->string('PermanentAddress');
            $table->string('PassportOrNationalIdNumber')->unique();;
            $table->string('IDScan')->nullable();
            $table->string('Nationality');
            $table->date('DOB');
            $table->string('Designation');
            $table->string('Gender')->nullable();
            $table->string('RoleID')->nullable();
            $table->string('ReportsTo')->nullable();
            $table->string('ReportsToRoleID')->nullable();
            $table->string('DepartmentID')->nullable();
            $table->string('ClusterID');
            $table->decimal('BasicSalary', 30, 2);
            $table->decimal('GrossSalary', 10, 2)->nullable();
            $table->string('EmpID')->unique();
            $table->string('StaffCode')->unique()->nullable();
            $table->date('JoiningDate');
            $table->date('ContractExpiry');
            $table->string('BankName');
            $table->string('BankBranch');
            $table->string('AccountName');
            $table->bigInteger('AccountNumber')->unique();
            $table->bigInteger('MonthsToExpiry')->nullable();
            $table->string('TIN')->nullable()->unique();
            $table->string('BankCode')->nullable();
            $table->string('StaffPhoto')->nullable();
            $table->string('uuid')->nullable();
            $table->string('RecordStatus')->default("Contract Active");
            $table->string('SoonExpiring')->default("false");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
