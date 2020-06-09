<?php

declare(strict_types=1);

namespace TheDoctor0\Stubs\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use TheDoctor0\Stubs\StubsServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * Register package provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array|string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            StubsServiceProvider::class,
        ];
    }
}
