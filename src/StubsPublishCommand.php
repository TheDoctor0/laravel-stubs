<?php

declare(strict_types=1);

namespace TheDoctor0\Stubs;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class StubsPublishCommand extends Command
{
    use ConfirmableTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stubs:publish {--force : Overwrite any existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all opinionated stubs that are available for customization';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (! $this->confirmToProceed()) {
            return self::FAILURE;
        }

        if (! is_dir($this->laravel->basePath('stubs'))) {
            (new Filesystem())->makeDirectory($this->laravel->basePath('stubs'));
        }

        $files = collect(File::files(__DIR__ . '/../stubs'));

        $published = $this
            ->publishable($files)
            ->each(fn (SplFileInfo $file) => file_put_contents(
                $this->targetPath($file),
                file_get_contents($file->getPathname())
            ))
            ->count();

        $this->info("{$published} / {$files->count()} stubs published.");

        return self::SUCCESS;
    }

    /**
     * Files to publish — all of them with --force, otherwise only new ones.
     *
     * @param \Illuminate\Support\Collection<int, \Symfony\Component\Finder\SplFileInfo> $files
     *
     * @return \Illuminate\Support\Collection<int, \Symfony\Component\Finder\SplFileInfo>
     */
    protected function publishable(Collection $files): Collection
    {
        if ($this->option('force')) {
            return $files;
        }

        return $files->reject(fn (SplFileInfo $file) => file_exists($this->targetPath($file)));
    }

    /**
     * Target path for a stub inside the application.
     */
    protected function targetPath(SplFileInfo $file): string
    {
        return $this->laravel->basePath('stubs') . "/{$file->getFilename()}";
    }
}
