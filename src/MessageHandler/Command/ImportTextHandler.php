<?php

namespace App\MessageHandler\Command;

use App\Message\Command\ImportText;
use App\Message\Event\TextImported;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
final class ImportTextHandler
{
    public function __construct(
        private readonly MessageBusInterface $eventBus,
    )
    {
    }
    public function __invoke(ImportText $message)
    {
        dump(sprintf('Import Text %d in %s', $message->id, $message->locale));

        dump('Throw event TextImported');
        $this->eventBus->dispatch(new TextImported($message->id, $message->locale));
    }

}