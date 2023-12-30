<?php

namespace Selfofficename\Modules\Domain\Commission;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\CsrdConstants;
use Selfofficename\Modules\Domain\Card\Models\Schemas\Constants\TransactionConstants;

class CommissionServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.CommissionCo::MIGRATION_ROUTE);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(CommissionC::PREFIX)
            ->namespace(CommissionC::CONTROLLER_ROUTE)
            ->group(__DIR__.CommissionC::API_ROUTE);
    }
}
