<?php

namespace Selfofficename\Modules\Domain\Transaction\Models\Schemas;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Selfofficename\Modules\Domain\Transaction\Enums\StatusEnum;

class AddTransactionSchema
{
    /**
     * @return void
     */
    public static function createTable(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('source_card_id');
            $table->unsignedBigInteger('destination_card_number');
            $table->unsignedBigInteger('amount');
            $table->integer('status')->default(StatusEnum::PENDING->value);
            $table->timestamps();

            $table->foreign('source_card_id')->references('id')->on('cards')->onDelete('no action');
        });
    }

    /**
     * @return void
     */
    public static function dropTable(): void
    {
        Schema::dropIfExists('transactions');
    }
}
