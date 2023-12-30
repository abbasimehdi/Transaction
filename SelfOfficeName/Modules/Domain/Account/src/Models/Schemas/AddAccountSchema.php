<?php

namespace Selfofficename\Modules\Domain\Product\Models\Schemas;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountSchema
{
    /**
     * @return void
     */
    public static function createTable(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public static function dropTable(): void
    {
        Schema::dropIfExists('accounts');
    }
}
