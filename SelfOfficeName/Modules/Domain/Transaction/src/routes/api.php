<?php

use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Transaction\Http\Controllers\TransactionController;
use Selfofficename\Modules\Domain\Transaction\Models\Schemas\Constants\TransactionConstants;

Route::prefix(TransactionConstants::VERSION)
    ->middleware(['auth:api'])
    ->group(function ($router) {
    $router->Apiresource(TransactionConstants::TRANSACTION, TransactionController::class);
});
