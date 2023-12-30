<?php

namespace Selfofficename\Modules\Domain\Card;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\CsrdConstants;

class CardServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.CsrdConstants::MIGRATION_ROUTE);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(CsrdConstants::PREFIX)
            ->namespace(CsrdConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.CsrdConstants::API_ROUTE);
    }
}
