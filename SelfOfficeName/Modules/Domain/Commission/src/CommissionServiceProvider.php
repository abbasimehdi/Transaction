<?php

namespace Selfofficename\Modules\Domain\Commission;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\CardConstants;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\TransactionConstants;
use Selfofficename\Modules\Domain\Commission\Models\Schemas\Constants\CommissionConstants;

class CommissionServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.CommissionConstants::MIGRATION_ROUTE);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(CommissionConstants::PREFIX)
            ->namespace(CommissionConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.CommissionConstants::API_ROUTE);
    }
}
