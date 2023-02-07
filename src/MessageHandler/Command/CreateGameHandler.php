<?php

namespace App\MessageHandler\Command;


use App\Entity\Games;
use App\Message\Command\CreateGame;
use App\Message\Event\GameCreatedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class CreateGameHandler
{
    private MessageBusInterface $eventBus;
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, MessageBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
        $this->entityManager = $entityManager;
    }

    public function __invoke(CreateGame $createGame): void
    {
        $game = (new Games())
                ->setHomeTeam($createGame->getHomeTeam())
                ->setAwayTeam($createGame->getAwayTeam());

        $this->entityManager->persist($game);
        $this->entityManager->flush();

        $this->eventBus->dispatch(new GameCreatedEvent($createGame->getHomeTeam(), $createGame->getAwayTeam()));
    }
}
