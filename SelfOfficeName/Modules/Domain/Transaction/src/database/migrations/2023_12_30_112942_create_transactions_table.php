<?php

use Illuminate\Database\Migrations\Migration;
use Selfofficename\Modules\Domain\Transaction\Models\Schemas\AddTransactionSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        AddTransactionSchema::createTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AddTransactionSchema::dropTable();
    }
};
