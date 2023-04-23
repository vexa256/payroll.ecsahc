<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW soon_expiring_contracts AS
        SELECT
            id,
            StaffName,
            EmployeeType,
            Email,
            PhoneNumber,
            Nationality,


            JoiningDate,
            ContractExpiry,
            DATEDIFF(ContractExpiry, CURDATE()) AS DaysRemaining,
            FLOOR(DATEDIFF(ContractExpiry, CURDATE()) / 30) AS MonthsRemaining
        FROM
            employees
        WHERE
            DATEDIFF(ContractExpiry, CURDATE()) <= 90;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soon_expiring_contracts');
    }
};
