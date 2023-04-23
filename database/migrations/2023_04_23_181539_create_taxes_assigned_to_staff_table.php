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
        Schema::create('taxes_assigned_to_staff', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('TID');
            $table->string('AmountInUsd');
            $table->date('ValidFrom');
            $table->date('ValidTo');
            $table->string('valid')->default('true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes_assigned_to_staff');
    }
};
