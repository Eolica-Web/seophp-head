<?php

declare(strict_types=1);

namespace Seo\Head\Hooks;

use Seo\Head\Head;

final readonly class TitleAddedHookContext
{
    public function __construct(
        public Head $head,
        public string $value,
    ) {}
}
