<?php

declare(strict_types=1);

namespace app\actions\license;

final readonly class LicenseEntry
{
    public function __construct(
        public string $name,
        public string $html,
    ) {
    }
}
