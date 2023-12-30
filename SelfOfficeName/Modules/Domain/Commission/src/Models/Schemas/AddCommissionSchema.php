<?php

namespace Selfofficename\Modules\Domain\Commission\Models\Schemas;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommissionSchema
{
    /**
     * @return void
     */
    public static function createTable(): void
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id');
            $table->unsignedBigInteger('amount');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('no action');
        });
    }

    /**
     * @return void
     */
    public static function dropTable(): void
    {
        Schema::dropIfExists('commissions');
    }
}
