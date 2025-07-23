<?php

declare(strict_types=1);

namespace Seo\Head;

enum HeadHook: string
{
    case TitleAdded = 'title:added';
    case TagsAdded = 'tags:added';
    case TagsResolving = 'tags:resolving';
    case TagsResolved = 'tags:resolved';
    case Rendering = 'rendering';
    case Rendered = 'rendered';
}
