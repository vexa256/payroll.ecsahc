<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $currentDate = now()->toDateString();

        DB::statement("
        CREATE VIEW contract_expiry_report AS
        SELECT
            StaffName,
            PhoneNumber,
            Email,
            Nationality,
            ContractExpiry,
            DATEDIFF(ContractExpiry, '{$currentDate}') AS days_remaining,
            PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM ContractExpiry), EXTRACT(YEAR_MONTH FROM '{$currentDate}')) AS months_remaining,
            (DATEDIFF(ContractExpiry, '{$currentDate}') <= 90) AS SoonExpiringStatus
        FROM
            employees
        WHERE
            ContractExpiry > '{$currentDate}'
        ORDER BY
            ContractExpiry ASC;
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_expiry_report_view');
    }
};
