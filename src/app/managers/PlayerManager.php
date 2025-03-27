<?php

namespace App\Managers;

use App\Entities\Player;
use App\Entities\Image;
use App\Managers\DatabaseManager;
use App\Entities\Team;
use App\Entities\Country;
use App\Entities\Weapon;
use App\Entities\Offer;
use App\Entities\Position;
use Exception;

class PlayerManager extends DatabaseManager
{

    public function selectPlayerByID(int $id): ?Player
    {
        $query = $this->getConnexion()->prepare("
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id,  c.name AS country_name, c.flag,
            i.id AS image_id, i.url AS image_url,
            COALESCE(GROUP_CONCAT(po.id, ':', po.name ORDER BY po.id SEPARATOR ','), 'Aucune') AS `position`,
            COALESCE(GROUP_CONCAT(o.id, ':', o.name ORDER BY o.id SEPARATOR ','), 'Aucune') AS `offer`,
            COALESCE(GROUP_CONCAT(w.id, ':', w.name ORDER BY w.id SEPARATOR ','), 'Aucune') AS `weapon`
        FROM player p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        LEFT JOIN player_position pp ON p.id = pp.player_id
        LEFT JOIN position po ON pp.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        LEFT JOIN player_offer po2 ON p.id = po2.player_id
        LEFT JOIN offer o ON po2.offer_id = o.id
        LEFT JOIN player_weapon pw ON p.id = pw.player_id  -- Corrigé ici pour joindre sur p.id
        LEFT JOIN weapon w ON pw.weapon_id = w.id  -- Corrigé ici pour la jointure avec weapon
        WHERE p.id = :id
        GROUP BY p.id, t.id, c.id, i.id;
        ");


        $query->execute([":id" => $id]);
        $player = $query->fetch();
        var_dump($player);

        if ($player !== false) {
            // Instanciation des objets
            $team = new Team(
                $player['team_id'],
                $player['team_name'],
                new Country($player['team_country_id'], $player['country_name'], $player['flag']), // Pays de l'équipe
                $player['is_in_nel'],
                $player['team_image']
            );

            $country = new Country(
                $player['country_id'],
                $player['country_name'],
                $player['flag']
            );

            $position = new Position(
                $player['position_id'],
                $player['position_name']
            );

            // Si une image existe, instancier l'objet Image
            $image = null;
            if ($player['image_id'] !== null) {
                $image = new Image(
                    $player['image_id'],
                    $player['image_url']
                );
            }

            // Créer l'objet Player avec ses propriétés
            return new Player(
                $player['player_id'],
                $player['player_name'],
                $player['jersey_number'],
                $team, // L'objet Team
                $country, // L'objet Country
                $position, // L'objet Position
                $image // L'objet Image (peut être null si aucune image n'est liée)
            );
        }
        return null;
    }

    public function selectAllPlayers(): array
    {
        $queryAll = $this->getConnexion()->prepare("
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
            po.id AS position_id, po.name AS position_name,
            i.id AS image_id, i.url as image_url
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        JOIN position po ON p.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        ");

        $queryAll->execute();
        $players = [];

        while ($player = $queryAll->fetch()) {
            if ($player !== false) {
                // Instanciation des objets
                $team = new Team(
                    $player['team_id'],
                    $player['team_name'],
                    new Country($player['team_country_id'], $player['country_name'], $player['flag']),
                    $player['is_in_nel'],
                    $player['team_image']
                );

                $country = new Country(
                    $player['country_id'],
                    $player['country_name'],
                    $player['flag']
                );

                $position = new Position(
                    $player['position_id'],
                    $player['position_name']
                );

                // Si une image existe, instancier l'objet Image
                $image = null;
                if ($player['image_id'] !== null) {
                    $image = new Image(
                        $player['image_id'],
                        $player['image_url']
                    );
                }

                // Créer l'objet Player avec ses propriétés
                $players[] = new Player(
                    $player['player_id'],
                    $player['player_name'],
                    $player['jersey_number'],
                    $team,
                    $country,
                    $position,
                    $image
                );
            }
        }

        return $players;  // Retourner tous les joueurs récupérés

    }

    public function addPlayer(Player $player): void
    {
        $queryAdd = $this->getConnexion()->prepare("
        INSERT INTO player (name,jersey_number,team_id,country_id,position_id)
        VALUES (:name, :jersey_number, :team_id, :country_id, :position_id)
        ");

        $queryAdd->execute([
            ':name' => $player->getName(),
            ':jersey_number' => $player->getNumber(),
            ':team_id' => $player->getTeam()->getId(),
            ':country_id' => $player->getCountry()->getId()
        ]);
    }

    public function updatePlayer(Player $player): void
    {
        $queryUpdate = $this->getConnexion()->prepare("
        UPDATE player
        SET name = :name, jersey_number = :jersey_number, team_id = :team_id, country_id = :country_id, position_id = :position_id
        WHERE id = :id
        ");

        $queryUpdate->execute([
            ':name' => $player->getName(),
            ':jersey_number' => $player->getNumber(),
            ':team_id' => $player->getTeam()->getId(),
            ':country_id' => $player->getCountry()->getId()
        ]);
    }

    public function deletePlayer(int $id): void
    {
        $queryDelete = $this->getConnexion()->prepare("
        DELETE FROM player WHERE id = :id ");
        $queryDelete->execute([':id' => $id]);
    }

    public function getPlayerByName(string $player): ?array
    {
        $queryName = $this->getConnexion()->prepare("
            SELECT 
                p.id AS player_id, p.name AS player_name, p.number, 
                t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
                c.id AS country_id, c.name AS country_name, c.flag,
                po.id AS position_id, po.name AS position_name,
                i.id AS image_id, i.url as image_url
            FROM players p
            JOIN team t ON p.team_id = t.id
            JOIN country c ON p.country_id = c.id
            JOIN position po ON p.position_id = po.id
            LEFT JOIN player_image pi ON pi.player_id = p.id
            LEFT JOIN image i ON pi.image_id = i.id
            WHERE p.name = :player,
            LIMIT 1;
        ");

        $queryName->execute([":player" => $player]);
        $player = $queryName->fetch();
        return $player ?: null; // Retourne null si aucun joueur trouvé
    }

    public function getPlayersByTeam(int $teamId): array
    {
        $queryTeam = $this->getConnexion()->prepare("
            SELECT 
                p.id AS player_id, p.name AS player_name, p.number, 
                t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
                c.id AS country_id, c.name AS country_name, c.flag,
                po.id AS position_id, po.name AS position_name,
                i.id AS image_id, i.url as image_url
            FROM players p
            JOIN team t ON p.team_id = t.id
            JOIN country c ON p.country_id = c.id
            JOIN position po ON p.position_id = po.id
            LEFT JOIN player_image pi ON pi.player_id = p.id
            LEFT JOIN image i ON pi.image_id = i.id
            WHERE p.team_id = :teamId;
        ");

        $queryTeam->execute([":teamId" => $teamId]);
        return $queryTeam->fetchAll();
    }


    public function getPlayersByCountry(int $countryId): array
    {
        $queryCountry = $this->getConnexion()->prepare("
            SELECT 
                p.id AS player_id, p.name AS player_name, p.number, 
                t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
                c.id AS country_id, c.name AS country_name, c.flag,
                po.id AS position_id, po.name AS position_name,
                i.id AS image_id, i.url as image_url
            FROM players p
            JOIN team t ON p.team_id = t.id
            JOIN country c ON p.country_id = c.id
            JOIN position po ON p.position_id = po.id
            LEFT JOIN player_image pi ON pi.player_id = p.id
            LEFT JOIN image i ON pi.image_id = i.id
            WHERE p.country_id = :countryId;
        ");

        $queryCountry->execute([":countryId" => $countryId]);
        return $queryCountry->fetchAll();
    }

    public function getPlayersByPosition(int $positionId): array
    {
        $queryPosition = $this->getConnexion()->prepare("
            SELECT 
                p.id AS player_id, p.name AS player_name, p.number, 
                t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
                c.id AS country_id, c.name AS country_name, c.flag,
                po.id AS position_id, po.name AS position_name,
                i.id AS image_id, i.url as image_url
            FROM players p
            JOIN team t ON p.team_id = t.id
            JOIN country c ON p.country_id = c.id
            JOIN position po ON p.position_id = po.id
            LEFT JOIN player_image pi ON pi.player_id = p.id
            LEFT JOIN image i ON pi.image_id = i.id
            WHERE p.position_id = :positionId;
        ");

        $queryPosition->execute([":positionId" => $positionId]);
        return $queryPosition->fetchAll();
    }

    public function getPlayersByTeamAndCountry(?int $teamId = null, ?int $countryId = null): array
    {
        $queryTeamCountry = "
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
            po.id AS position_id, po.name AS position_name,
            i.id AS image_id, i.url as image_url
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        JOIN position po ON p.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        WHERE 1=1
    ";

        $params = [];

        if ($teamId !== null) {
            $queryTeamCountry .= " AND p.team_id = :teamId";
            $params[":teamId"] = (int) $teamId;
        }

        if ($countryId !== null) {
            $queryTeamCountry .= " AND p.country_id = :countryId";
            $params[":countryId"] = (int) $countryId;
        }

        try {
            $stmt = $this->getConnexion()->prepare($queryTeamCountry);
            $stmt->execute($params);
            return $stmt->fetchAll() ?: []; // Retourne un tableau vide si aucun joueur trouvé
        } catch (Exception $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return []; // Retourner un tableau vide en cas d'erreur
        }
    }

    public function getPlayersByTeamAndPosition(?int $teamId = null, ?int $positionId = null): array
    {
        $queryTeamPosition = "
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
            po.id AS position_id, po.name AS position_name,
            i.id AS image_id, i.url as image_url
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        JOIN position po ON p.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        WHERE 1=1
    ";

        $params = [];

        if ($teamId !== null) {
            $queryTeamPosition .= " AND p.team_id = :teamId";
            $params[":teamId"] = (int) $teamId;
        }

        if ($positionId !== null) {
            $queryTeamPosition .= " AND p.position_id = :positionId";
            $params[":countryId"] = (int) $positionId;
        }

        try {
            $stmt = $this->getConnexion()->prepare($queryTeamPosition);
            $stmt->execute($params);
            return $stmt->fetchAll() ?: []; // Retourne un tableau vide si aucun joueur trouvé
        } catch (Exception $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return []; // Retourner un tableau vide en cas d'erreur
        }
    }

    public function getPlayersByCountryAndPosition(?int $countryId = null, ?int $positionId = null): array
    {
        $querycountryPosition = "
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
            po.id AS position_id, po.name AS position_name,
            i.id AS image_id, i.url as image_url
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        JOIN position po ON p.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        WHERE 1=1
    ";

        $params = [];

        if ($countryId !== null) {
            $querycountryPosition .= " AND p.country_id = :countryId";
            $params[":countryId"] = (int) $countryId;
        }

        if ($positionId !== null) {
            $querycountryPosition .= " AND p.position_id = :positionId";
            $params[":positionId"] = (int) $positionId;
        }

        try {
            $stmt = $this->getConnexion()->prepare($querycountryPosition);
            $stmt->execute($params);
            return $stmt->fetchAll() ?: []; // Retourne un tableau vide si aucun joueur trouvé
        } catch (Exception $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return []; // Retourner un tableau vide en cas d'erreur
        }
    }

    public function getPlayersByCountryAndPositionANDTeam(?int $countryId = null, ?int $positionId = null, ?int $teamId = null): array
    {
        $queryCountryPositionTeam = "
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
            po.id AS position_id, po.name AS position_name,
            i.id AS image_id, i.url as image_url
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        JOIN position po ON p.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        WHERE 1=1
    ";

        $params = [];

        if ($countryId !== null) {
            $queryCountryPositionTeam .= " AND p.country_id = :countryId";
            $params[":countryId"] = (int) $countryId;
        }

        if ($positionId !== null) {
            $queryCountryPositionTeam .= " AND p.position_id = :positionId";
            $params[":positionId"] = (int) $positionId;
        }

        if ($teamId !== null) {
            $queryCountryPositionTeam .= " AND p.team_id = :teamId";
            $params[":teamId"] = (int) $teamId;
        }

        try {
            $stmt = $this->getConnexion()->prepare($queryCountryPositionTeam);
            $stmt->execute($params);
            return $stmt->fetchAll() ?: []; // Retourne un tableau vide si aucun joueur trouvé
        } catch (Exception $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return []; // Retourner un tableau vide en cas d'erreur
        }
    }
}
