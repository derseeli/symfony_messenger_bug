<?php

namespace App\MessageHandler\Event\WhenNodeImported;

use App\Message\Command\ImportCategory;
use App\Message\Event\NodeImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler(priority: 100)]
final class ImportNodeCategory
{
    public function __construct(
        private readonly MessageBusInterface $commandBus,
    )
    {
    }

    public function __invoke(NodeImported $message)
    {
        dump('Node was imported. Import category');

        $this->commandBus->dispatch(new ImportCategory($message->nodeId, $message->locale));
    }
}
