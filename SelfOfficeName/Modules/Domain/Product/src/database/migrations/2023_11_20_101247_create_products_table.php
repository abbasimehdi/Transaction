<?php

namespace Selfofficename\Modules\Domain\Product\database\migrations;

use Illuminate\Database\Migrations\Migration;
use Selfofficename\Modules\Domain\Product\Models\Schemas\AddProductSchema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        AddProductSchema::createTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AddProductSchema::dropTable();
    }
};
