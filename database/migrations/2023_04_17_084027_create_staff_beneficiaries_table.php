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
        Schema::create('staff_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('Name');
            $table->string('Relationship');
            $table->string('Nationality');
            $table->string('IdNumber');
            $table->string('IDType');
            $table->string('PdfIdScan')->nullable();
            $table->string('PassportNumber');
            $table->date('DateOfBirth');
            $table->string('Gender');
            $table->string('Address');
            $table->string('PhoneNumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_beneficiaries');
    }
};
