<?php

namespace Selfofficename\Modules\Domain\Card;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\CsrdConstants;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\TransactionConstants;

class TransactionServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.TransactionConstants::MIGRATION_ROUTE);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(TransactionConstants::PREFIX)
            ->namespace(TransactionConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.TransactionConstants::API_ROUTE);
    }
}
