<?php

namespace Src\App\Managers;

use App\Entities\Country;
use App\Entities\Team;
use App\Managers\DatabaseManager;

class TeamManager extends DatabaseManager
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

    public function selectAllTeam(): array
    {
        $queryAllTeam = $this->getConnexion()->prepare("
        SELECT  
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
        FROM team t
        JOIN country c ON t.country_id = c.id
        ");

        $queryAllTeam->execute();
        $teams = [];
        foreach ($teams as $team) {
            $teams[] = new Team(
                $team['team_id'],
                $team['team_name'],
                new Country($team['team_country_id'], $team['country_name'], $team['flag']),
                $team['is_in_nel'],
                $team['team_image']
            );
        }
        return $teams;
    }

    public function addTeam(Team $team): void
    {
        $queryAdd = $this->getConnexion()->prepare("
        INSERT INTO team (name,country_id,team_image)
        VALUES (:name, :country_id, :is_in_NEL, :team_image)
        ");

        $queryAdd->execute([
            ':name' => $team->getName(),
            ':country_id' => $team->getCountry()->getId(),
            ':is_in_NEL' => $team->getIsInNel(),
            ':team_image' => $team->getTeamLogo()
        ]);
    }

    public function updateTeam(Team $team): void
    {
        $queryUpdate = $this->getConnexion()->prepare("
        UPDATE team
        SET name = :name, country_id = :country_id, is_in_NEL = :is_in_NEL, team_image  = :team_image
        WHERE id = :id
        ");

        $queryUpdate->execute([
            ':name' => $team->getName(),
            ':country_id' => $team->getCountry()->getId(),
            'is_in_NEL' => $team->getIsInNel(),
            ':team_image' => $team->getTeamLogo(),
            ':id' => $team->getId()
        ]);
    }

    public function deleteTeam(int $teamId): void
    {
        $queryDelete = $this->getConnexion()->prepare("
        DELETE FROM team
        WHERE id = :id
    ");

        $queryDelete->execute([
            ':id' => $teamId  // Utilisation de l'ID de l'équipe à supprimer
        ]);
    }
}
