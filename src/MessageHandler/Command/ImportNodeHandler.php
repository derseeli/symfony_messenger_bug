<?php

namespace App\MessageHandler\Command;

use App\Message\Command\ImportNode;
use App\Message\Event\NodeImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
final class ImportNodeHandler
{
    public function __construct(
        private readonly MessageBusInterface $eventBus,
    )
    {
    }
    public function __invoke(ImportNode $message)
    {
        dump(sprintf('Import node %d in %s', $message->nodeId, $message->locale));

        dump('Throw event NodeImported');
        $this->eventBus->dispatch(new NodeImported($message->nodeId, $message->locale));
    }

}