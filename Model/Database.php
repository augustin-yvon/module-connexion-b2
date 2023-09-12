<?php
class Database {
    public $pdo;

    public function __construct() {
        $this->connect();
    }
    private function connect() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=moduleconnexionb2;port=3308", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
        }
    }
}
?>