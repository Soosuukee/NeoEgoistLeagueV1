<?php

class DatabaseManager
{
    private static ?PDO $pdo = null;

    public static function getConnexion()
    {
        if (self::$pdo == null) {
            // Si la connexion n'existe pas
            // Creer connexion 
            self::$pdo = self::connectDB();
        }
        return self::$pdo;
    }
    public static function connectDB(): PDO
    {
        $host = 'db';
        $dbName = 'neo_egoist_league';
        $user = 'ego';
        $password = 'Jinpachi';
        try {
            $pdo = new PDO(
                'mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8',
                $user,
                $password
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            echo ("Erreur de connexion a la base de données. connectDB()");
            die();
        }
    }
}
