<?php

namespace Selfofficename\Modules\Domain\Card;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\CardConstants;

class CardServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.CardConstants::MIGRATION_ROUTE);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(CardConstants::PREFIX)
            ->namespace(CardConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.CardConstants::API_ROUTE);
    }
}
