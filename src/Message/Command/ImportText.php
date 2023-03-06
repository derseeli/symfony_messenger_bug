<?php

namespace App\Message\Command;

final class ImportText
{
    public function __construct(
        public readonly int  $id,
        public readonly string $locale
    )
    {
    }
}
