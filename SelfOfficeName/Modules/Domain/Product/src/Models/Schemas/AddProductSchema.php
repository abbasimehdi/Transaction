<?php

namespace Selfofficename\Modules\Domain\Product\Models\Schemas;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductSchema
{
    /**
     * @return void
     */
    public static function createTable(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public static function dropTable(): void
    {
        Schema::dropIfExists('products');
    }
}
