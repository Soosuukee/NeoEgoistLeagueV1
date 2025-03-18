<?php

require_once('Country.php');
require_once('Team.php');
class Player
{
    private int $id;
    private string $name;
    private ?int $number;
    private Team $team;
    private Country $country;

    public function __construct(int $id, string $name, ?int $number, Team $team, Country $country)
    {
        $this->id = $id;
        $this->name = $name;
        $this->number = $number;
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
        return $this->number;
    }

    public function setNumber(?int $number): void
    {
        if ($number !== null && ($number < 1 || $number > 99)) {
            throw new InvalidArgumentException("Le numéro du joueur doit être entre 1 et 99.");
        }
        $this->number = $number;
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
