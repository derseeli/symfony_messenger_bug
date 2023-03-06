<?php

namespace App\MessageHandler\Event\WhenNodeImported;

use App\Message\Command\ImportCategory;
use App\Message\Command\ImportText;
use App\Message\Event\NodeImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler(priority: 70)]
final class ImportNodeText
{
    public function __construct(
        private readonly MessageBusInterface $commandBus,
    )
    {
    }

    public function __invoke(NodeImported $message)
    {
        dump('Node was imported. Import Text');

        $this->commandBus->dispatch(new ImportText($message->nodeId, $message->locale));
    }
}
