<?php

namespace Src\App\Managers;

use App\Entities\Country;
use App\Entities\Team;
use App\Managers\DatabaseManager;

class PlayerManager extends DatabaseManager
{

    public function selectTeamById(int $id): ?Team
    {
        $query = $this->getConnexion()->prepare("
        SELECT  
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
        FROM team t
        JOIN country c ON t.country_id = c.id
        WHERE t.id = :id;
        ");

        $query->execute([":id" => $id]);
        $team = $query->fetch();
        var_dump($team);
        if ($team !== false) {
            // Instanciation des objets
            $team = new Team(
                $team['team_id'],
                $team['team_name'],
                new Country($team['team_country_id'], $team['country_name'], $team['flag']),
                $team['is_in_nel'],
                $team['team_image']
            ); // Pays de l'équipe
        }
        return $team;
    }
}
