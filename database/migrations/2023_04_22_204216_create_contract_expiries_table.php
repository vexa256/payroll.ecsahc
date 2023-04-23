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
        DB::statement("
        CREATE VIEW contract_expiries AS
        SELECT
    id,
    StaffName,
    PhoneNumber,
    Email,
    Nationality,
    DATE_FORMAT(ContractExpiry, '%M %e, %Y') AS ContractExpiry,
    DATEDIFF(CURDATE(), ContractExpiry) AS DaysPassed
FROM
    employees
WHERE
    ContractExpiry < CURDATE() AND RecordStatus = 'Contract Expired';

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_expiries');
    }
};
