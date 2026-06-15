<?php
/**
 * Configuration de la base de données
 * Connexion PDO
 */

class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $pdo;
    
    public function __construct() {
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->db = getenv('DB_NAME') ?: 'campus_verite';
        $this->user = getenv('DB_USER') ?: 'root';
        $this->pass = getenv('DB_PASS') ?: '';
        
        $this->connect();
    }
    
    private function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    
    public function getPDO() {
        return $this->pdo;
    }
}
