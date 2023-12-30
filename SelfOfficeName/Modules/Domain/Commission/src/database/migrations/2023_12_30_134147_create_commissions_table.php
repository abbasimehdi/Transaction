<?php

use Illuminate\Database\Migrations\Migration;
use Selfofficename\Modules\Domain\Commission\Models\Schemas\AddCommissionSchema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        AddCommissionSchema::createTable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AddCommissionSchema::dropTable();
    }
};
