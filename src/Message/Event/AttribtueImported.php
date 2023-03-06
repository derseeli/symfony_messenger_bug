<?php

namespace App\Message\Event;

use App\Message\SyncMessageInterface;

final class AttribtueImported implements SyncMessageInterface
{
    public function __construct(
        public readonly int  $nodeId,
        public readonly string $locale,
    )
    {
    }
}
