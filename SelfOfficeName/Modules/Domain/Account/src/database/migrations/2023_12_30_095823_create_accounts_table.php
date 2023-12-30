<?php

use Illuminate\Database\Migrations\Migration;
use Selfofficename\Modules\Domain\Account\Models\Schemas\AddAccountSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        AddAccountSchema::createTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       AddAccountSchema::dropTable();
    }
};
