<?php

namespace App\Message\Command;

final class ImportCategory
{
    public function __construct(
        public readonly int  $nodeId,
        public readonly string $locale,
    )
    {
    }
}
