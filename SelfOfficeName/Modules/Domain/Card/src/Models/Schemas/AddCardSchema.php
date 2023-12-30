<?php

namespace Selfofficename\Modules\Domain\Card\Models\Schemas;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCardSchema
{
    /**
     * @return void
     */
    public static function createTable(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('account_id');
            $table->string('number');
            $table->date('expire_date');
            $table->unsignedInteger('cvv2');
            $table->unsignedBigInteger('amount');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('no action');
        });
    }

    /**
     * @return void
     */
    public static function dropTable(): void
    {
        Schema::dropIfExists('cards');
    }
}
