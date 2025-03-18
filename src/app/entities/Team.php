<?php

require_once('Country.php');
class Team
{
    private int $id;
    private string $name;

    private Country $country;
    private bool $is_in_nel;
    private string $team_logo;

    public function __construct(int $id, string $name, Country $country, bool $is_in_nel, string $team_logo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
        $this->is_in_nel = $is_in_nel;
        $this->team_logo = $team_logo;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function getIsInNel(): bool
    {
        return $this->is_in_nel;
    }

    public function getTeamLogo(): string
    {
        return $this->team_logo;
    }
}
