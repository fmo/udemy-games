<?php

namespace App\Message\Command;

class EndGame
{
    private string $homeTeam;
    private string $awayTeam;
    private string $result;

    public function __construct(string $homeTeam, string $awayTeam, string $result)
    {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->result = $result;
    }

    public function getHomeTeam(): string
    {
        return $this->homeTeam;
    }

    public function getAwayTeam(): string
    {
        return $this->awayTeam;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
