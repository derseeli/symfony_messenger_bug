<?php

namespace App\MessageHandler\Command;

use App\Message\Command\ImportCategory;
use App\Message\Command\ImportNode;
use App\Message\Event\NodeImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
final class ImportCategoryHandler
{
    public function __construct(
        private readonly MessageBusInterface $eventBus,
    )
    {
    }
    public function __invoke(ImportCategory $message)
    {
        dump(sprintf('Import category %d in %s', $message->nodeId, $message->locale));

        dump('Throw event CategoryImported');
        $this->eventBus->dispatch(new NodeImported($message->nodeId, $message->locale));
    }

}