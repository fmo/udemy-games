<?php

namespace App\MessageHandler\Command;

use App\Message\Command\EndGame;
use App\Message\Event\GameEndedEvent;
use App\Repository\GamesRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class EndGameHandler
{
    private GamesRepository $gamesRepository;
    private MessageBusInterface $eventBus;

    public function __construct(GamesRepository $gamesRepository, MessageBusInterface $eventBus)
    {
        $this->gamesRepository = $gamesRepository;
        $this->eventBus = $eventBus;
    }

    public function __invoke(EndGame $endGame): void
    {
        $foundGame = $this->gamesRepository->findOneBy([
            'homeTeam' => $endGame->getHomeTeam(),
            'awayTeam' => $endGame->getAwayTeam()
        ]);

        $foundGame?->setResult($endGame->getResult());

        $this->gamesRepository->save($foundGame, true);

        $this->eventBus->dispatch(
            new GameEndedEvent($endGame->getHomeTeam(), $endGame->getAwayTeam(), $endGame->getResult())
        );
    }
}
