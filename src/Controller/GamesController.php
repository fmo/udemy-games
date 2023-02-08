<?php

namespace App\Controller;

use App\Message\Command\CreateGame;
use App\Message\Command\EndGame;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

class GamesController extends AbstractController
{
    public function create(Request $request, MessageBusInterface $messageBus): Response
    {
        $request = $request->toArray();

        $message = new CreateGame($request['homeTeam'], $request['awayTeam']);

        $messageBus->dispatch($message);

        return new Response('OK');
    }

    public function end(Request $request, MessageBusInterface $messageBus): Response
    {
        $request = $request->toArray();

        $message = new EndGame($request['homeTeam'], $request['awayTeam'], $request['result']);
        $messageBus->dispatch($message);

        return new Response('OK');
    }
}
