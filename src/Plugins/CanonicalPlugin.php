<?php

declare(strict_types=1);

namespace Seo\Head\Plugins;

use Closure;
use Seo\Head\Head;
use Seo\Head\HeadHook;
use Seo\Head\HeadPlugin;
use Seo\Head\HeadTag;
use Seo\Head\HeadTagPosition;
use Seo\Head\HeadTags;

final readonly class CanonicalPlugin implements HeadPlugin
{
    /**
     * @param Closure(): string $urlResolver
     */
    private function __construct(private Closure $urlResolver) {}

    /**
     * @param Closure(): string $urlResolver
     */
    public static function make(Closure $urlResolver): HeadPlugin
    {
        return new self($urlResolver);
    }

    public function initialize(Head $head): void
    {
        $head->hook(
            HeadHook::TagsResolving->value,
            function (HeadTags $tags): void {
                $tags->add(new HeadTag(
                    type: 'link',
                    attributes: [
                        'rel' => 'canonical',
                        'href' => ($this->urlResolver)(),
                    ],
                    textContent: null,
                    position: HeadTagPosition::Head,
                ));
            },
        );
    }
}
