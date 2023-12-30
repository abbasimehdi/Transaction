<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Selfofficename\Modules\Domain\Product\Models\Schemas\AddAccountSchema;

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
