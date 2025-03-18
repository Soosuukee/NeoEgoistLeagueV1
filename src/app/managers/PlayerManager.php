<?php
require_once('DatabaseManager.php');
require_once(__DIR__ . '/../entities/Player.php');
require_once(__DIR__ . '/../entities/Team.php');
require_once(__DIR__ . '/../entities/Country.php');

class PlayerManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectPlayerByID(int $id): ?Player
    {
        $requete = $this->db->prepare("
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        WHERE p.id = :id;
    ");

        $requete->execute([":id" => $id]);
        $player = $requete->fetch(PDO::FETCH_ASSOC);

        if ($player !== false) {
            return new Player(
                $player['player_id'],
                $player['player_name'],
                $player['number'],
                new Team(
                    $player['team_id'],
                    $player['team_name'],
                    new Country($player['team_country_id'], $player['country_name'], $player['flag']),
                    $player['is_in_nel'],
                    $player['team_image']
                ),
                new Country($player['country_id'], $player['country_name'], $player['flag'])
            );
        }

        return null;
    }
}
