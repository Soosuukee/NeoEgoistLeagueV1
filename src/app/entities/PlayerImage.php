<?php
require_once('Player.php');
require_once('Image.php'); 
class PlayerImage
{
    private Player $player;
    private Image $image;

    public function __construct(Player $player, Image $image)
    {
        $this->player = $player;
        $this->image = $image;
    }

    public function getPlayerId(): Player
    {
        return $this->player;
    }

    public function getImageId(): Image
    {
        return $this->image;
    }
}
