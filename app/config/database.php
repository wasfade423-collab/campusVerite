<?php
require_once 'app/config/envLoader.php';

class Database
{
    private static $pdo = null;

    public static function connect()
    {
        if (self::$pdo === null) {
            try {
                $host = $_ENV['DB_HOST'] ?? 'localhost';
                $dbname = $_ENV['DB_NAME'] ?? 'campus_verite';
                $user = $_ENV['DB_USER'] ?? 'root';
                $pass = $_ENV['DB_PASS'] ?? '';

                self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die("Erreur critique de base de données : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
