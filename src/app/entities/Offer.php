<?php
require_once('Player.php');
require_once('Team.php');
class Offer
{
    private int $id;
    private Player $player;
    private Team $team;
    private float $amount;

    public function __construct(int $id, Player $player, Team $team, float $amount)
    {
        $this->id = $id;
        $this->player = $player;
        $this->team = $team;
        $this->amount = $amount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPlayerId(): Player
    {
        return $this->player;
    }

    public function getTeamId(): Team
    {
        return $this->team;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }
}
