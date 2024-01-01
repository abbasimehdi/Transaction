<?php

use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Transaction\Http\Controllers\TransactionController;

Route::prefix('v1')->middleware(['auth:api'])->group(function ($router) {
    $router->Apiresource('transaction', TransactionController::class);
});
