<?php

declare(strict_types=1);

namespace TheDoctor0\Stubs;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\ConfirmableTrait;
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
     *
     * @return int
     */
    public function handle(): int
    {
        if (! $this->confirmToProceed()) {
            return 1;
        }

        if (! is_dir($stubsPath = $this->laravel->basePath('stubs'))) {
            (new Filesystem)->makeDirectory($stubsPath);
        }

        $override = $this->option('force');

        collect(File::files(__DIR__ . '/../stubs'))
            ->each(fn (SplFileInfo $file) => $this->copy($file, $stubsPath, $override));

        $this->info('Stubs published!');

        return 0;
    }

    /**
     * Copy file to specified path.
     *
     * @param \Symfony\Component\Finder\SplFileInfo $file
     * @param string                                $path
     * @param bool                                  $override
     *
     * @return void
     */
    protected function copy(SplFileInfo $file, string $path, bool $override): void
    {
        $targetPath = $path . "/{$file->getFilename()}";
        $sourcePath = $file->getPathname();

        if ($override || ! file_exists($targetPath)) {
            file_put_contents($targetPath, file_get_contents($sourcePath));
        }
    }
}
