<?php

namespace App\Message\Command;

final class ImportNode
{
    public function __construct(
        public readonly int  $nodeId,
        public readonly string $locale,
    )
    {
    }
}
