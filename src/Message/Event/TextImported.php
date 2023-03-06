<?php

namespace App\Message\Event;

use App\Message\SyncMessageInterface;

final class TextImported implements SyncMessageInterface
{
    public function __construct(
        public readonly int  $id,
        public readonly string $locale,
    )
    {
    }
}
