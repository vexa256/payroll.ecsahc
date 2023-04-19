<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('benefits_logs', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('Benefit');
            $table->decimal('Amount', 30, 2);
            $table->string('Currency');
            $table->string('ConversionID')->nullable();
            $table->decimal('USD_To_TSH_Rate', 10, 2)->nullable();
            $table->date('DateEffected');
            $table->string('Month');
            $table->string('Year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits_logs');
    }
};
