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
        Schema::create('percentage_deductions', function (Blueprint $table) {
            $table->id();
            $table->string('Deduction');
            $table->string('Description');
            $table->string('PDID');
            $table->decimal('PercentageOfSalary', 30, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percentage_deductions');
    }
};
