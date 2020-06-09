<?php

declare(strict_types=1);

namespace TheDoctor0\Stubs\Canvas;

class Package extends \Orchestra\Canvas\Core\Presets\Package
{
    /**
     * Get custom stub path.
     *
     * @return string|null
     */
    public function getCustomStubPath(): ?string
    {
        return __DIR__.'/../../stubs';
    }
}
