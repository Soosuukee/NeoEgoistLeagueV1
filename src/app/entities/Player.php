<?php

namespace App\Entities;

use App\Entities\Country;
use App\Entities\Team;

class Player
{
    private int $id;
    private string $name;
    private ?int $jersey_number;
    private Team $team;
    private Country $country;

    public function __construct(int $id, string $name, ?int $jersey_number, Team $team, Country $country)
    {
        $this->id = $id;
        $this->name = $name;
        $this->jersey_number = $jersey_number;
        $this->team = $team;
        $this->country = $country;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumber(): ?int
    {
        return $this->jersey_number;
    }

    public function setNumber(?int $jersey_number): void
    {
        $this->jersey_number = $jersey_number;
    }

    public function getTeam(): Team
    {
        return $this->team;
    }

    public function getCountry(): Country
    {
        return $this->country;
    }
}
