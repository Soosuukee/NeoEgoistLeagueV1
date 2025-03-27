<?php

namespace App\Entities;

use App\Entities\Player;
use App\Entities\Weapon;

class PlayerWeapon
{
    private Player $player;
    private Weapon $weapon;

    public function __construct(Player $player, Weapon $weapon)
    {
        $this->player = $player;
        $this->weapon = $weapon;
    }

    public function getPlayerId(): Player
    {
        return $this->player;
    }

    public function getWeaponId(): Weapon
    {
        return $this->weapon;
    }
}
