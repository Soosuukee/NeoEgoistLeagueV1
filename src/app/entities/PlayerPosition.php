<?php

namespace App\Entities;

use App\Entities\Player;
use App\Entities\Position;

class PlayerPosition
{
    private Player $player;
    private Position $position;

    public function __construct(Player $player, position $position)
    {
        $this->player = $player;
        $this->position = $position;
    }

    public function getPlayerId(): Player
    {
        return $this->player;
    }

    public function getPositionId(): position
    {
        return $this->position;
    }
}
