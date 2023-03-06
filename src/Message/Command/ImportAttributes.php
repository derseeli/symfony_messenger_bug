<?php

namespace App\Message\Command;

final class ImportAttributes
{
    public function __construct(
        public readonly int  $nodeId,
        public readonly string $locale,
    )
    {
    }
}
