<?php

require_once('Country.php');
require_once('Team.php');
require_once('Position.php');
class Player
{
    private int $id;
    private string $name;
    private ?int $jersey_number;
    private Team $team;
    private Country $country;
    private Position $position;

    public function __construct(int $id, string $name, ?int $jersey_number, Team $team, Country $country, Position $position)
    {
        $this->id = $id;
        $this->name = $name;
        $this->jersey_number = $jersey_number;
        $this->team = $team;
        $this->country = $country;
        $this->position = $position;
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
        if ($jersey_number !== null && ($jersey_number < 1 || $jersey_number > 99)) {
            throw new InvalidArgumentException("Le numéro du joueur doit être entre 1 et 99.");
        }
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

    public function getPosition(): Position
    {
        return $this->position;
    }
}
