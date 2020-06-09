<?php

declare(strict_types=1);

namespace TheDoctor0\Stubs;

use Illuminate\Support\ServiceProvider;

class StubsServiceProvider extends ServiceProvider
{
    /**
     * Register publish command.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                StubsPublishCommand::class,
            ]);
        }
    }
}
