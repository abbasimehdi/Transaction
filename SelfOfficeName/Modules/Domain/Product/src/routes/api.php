<?php

use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Product\Http\Controllers\ProductController;

Route::group([],function ($route)  {
    $route->apiResources([
        'product' => ProductController::class,
    ]);
});

