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
        Schema::create('constant_benefits', function (Blueprint $table) {
            $table->id();

            $table->string('Benefit');
            $table->string('CBID');
            $table->string('Description');
            $table->decimal('Amount', 30, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constant_benefits');
    }
};
