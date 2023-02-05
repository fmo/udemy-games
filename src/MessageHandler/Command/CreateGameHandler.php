<?php

namespace App\MessageHandler\Command;


use App\Message\Command\CreateGame;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateGameHandler
{
    public function __invoke(CreateGame $createGame)
    {
        dd($createGame);
    }
}
