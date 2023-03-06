<?php

namespace App\MessageHandler\Command;

use App\Message\Command\ImportAttributes;
use App\Message\Event\AttribtueImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
final class ImportAttributesHandler
{
    public function __construct(
        private readonly MessageBusInterface $eventBus,
    )
    {
    }
    public function __invoke(ImportAttributes $message)
    {
        dump(sprintf('Import attributes for node %d in %s', $message->nodeId, $message->locale));

        dump('Throw event NodeAttributesImported');
        $this->eventBus->dispatch(new AttribtueImported($message->nodeId, $message->locale));
    }

}