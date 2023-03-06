<?php

namespace App\Message\Command;

final class ImportCategory
{
    public function __construct(
        public readonly int  $nodeID,
        public readonly string $locale,
    )
    {
    }
}
