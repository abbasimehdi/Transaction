<?php

namespace Selfofficename\Modules\Domain\Account;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Selfofficename\Modules\Domain\Product\Console\Commands\FireCommand;
use Selfofficename\Modules\Domain\Product\Models\Schemas\Constants\AccountConstants;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routeRegister();
        $this->loadMigrationsFrom(__DIR__.AccountConstants::MIGRATION_ROUTE);
    }

    /**
     * @return void
     */
    private function routeRegister(): void
    {
        Route::prefix(AccountConstants::PREFIX)
            ->namespace(AccountConstants::CONTROLLER_ROUTE)
            ->group(__DIR__.AccountConstants::API_ROUTE);
    }
}
