<?php

namespace Selfofficename\Modules\Domain\Account\Models\Schemas;

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
            $table->foreignId('user_id');
            $table->string('number')->unique();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
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
