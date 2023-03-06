<?php

namespace App\Message\Event;

use App\Message\SyncMessageInterface;

final class CategoryImported implements SyncMessageInterface
{
    public function __construct(
        public readonly int  $nodeId,
        public readonly string $locale,
    )
    {
    }
}
