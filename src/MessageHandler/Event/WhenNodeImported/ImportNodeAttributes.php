<?php

namespace App\MessageHandler\Event\WhenNodeImported;

use App\Message\Command\ImportAttributes;
use App\Message\Event\NodeImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler(priority: 60)]
final class ImportNodeAttributes
{
    public function __construct(
        private readonly MessageBusInterface $commandBus,
    )
    {
    }

    public function __invoke(NodeImported $message)
    {
        dump('Node was imported. Import Attributes');

        $this->commandBus->dispatch(new ImportAttributes($message->nodeId, $message->locale));
    }
}
