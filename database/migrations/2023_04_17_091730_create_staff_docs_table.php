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
        Schema::create('staff_docs', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            // $table->string('StaffName');
            // $table->string('Department');
            // $table->string('Designation');
            $table->string('DocumentCategory');
            $table->string('DocumentTitle');
            $table->text('Description');
            $table->string('DocURL')->nullable();
            $table->string('DOCID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_docs');
    }
};
