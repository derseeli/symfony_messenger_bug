<?php

namespace App\MessageHandler\Event\WhenNodeImported;

use App\Message\Event\NodeImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(priority: 110)]
final class NotifyBackend
{
    public function __invoke(NodeImported $message)
    {
        dump('Node was imported. Notify Backend');
    }
}
