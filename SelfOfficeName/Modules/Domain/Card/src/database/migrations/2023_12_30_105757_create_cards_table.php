<?php

use Illuminate\Database\Migrations\Migration;
use Selfofficename\Modules\Domain\Card\Models\Schemas\AddCardSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        AddCardSchema::createTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AddCardSchema::dropTable();
    }
};
