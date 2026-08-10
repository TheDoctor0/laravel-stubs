<?php

declare(strict_types=1);

namespace TheDoctor0\Stubs\Tests;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;

class StubPublishCommandTest extends TestCase
{
    #[Test]
    public function it_can_publish_stubs(): void
    {
        $targetStubsPath = $this->app->basePath('stubs');

        File::deleteDirectory($targetStubsPath);

        $total = count(File::files(__DIR__ . '/../stubs'));

        $this->artisan('stubs:publish')
            ->expectsOutputToContain("{$total} / {$total} stubs published.")
            ->assertExitCode(0);

        $this->assertFileEquals(
            __DIR__ . '/../stubs/migration.stub',
            $targetStubsPath . '/migration.stub'
        );
    }

    #[Test]
    public function it_skips_existing_stubs_without_force(): void
    {
        $targetStubsPath = $this->app->basePath('stubs');

        File::deleteDirectory($targetStubsPath);

        $this->artisan('stubs:publish')->assertExitCode(0);

        $total = count(File::files(__DIR__ . '/../stubs'));

        $this->artisan('stubs:publish')
            ->expectsOutputToContain("0 / {$total} stubs published.")
            ->assertExitCode(0);
    }
}
