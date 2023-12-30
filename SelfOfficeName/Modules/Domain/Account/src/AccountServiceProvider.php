<?php

namespace Selfofficename\Modules\Domain\Account;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Product\Console\Commands\FireCommand;
use Selfofficename\Modules\Domain\Product\Models\Schemas\Constants\CsrdConstants;

class AccountServiceProvider extends ServiceProvider
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
