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
        Schema::create('benefits_assigned_to_staff', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('BID');
            $table->string('AmountInUSD');
            $table->date('ValidFrom');
            $table->date('ValidTo');
            $table->string('Type')->default('constant');
            $table->string('valid')->default('true');
            $table->string('Taxable')->default('true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits_assigned_to_staff');
    }
};
