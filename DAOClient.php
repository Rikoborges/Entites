<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/Connect.php';
require_once __DIR__ . '/entiteClient.php';





class DAOClient {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Connect::connect();
    }

    public function insert(EntiteClient $c): bool {
        $sql = "INSERT INTO clients (nom, prenom, email, dateNaissance, dateInscription)
                VALUES (:nom, :prenom, :email, :dateNaissance, :dateInscription)";
        
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $c->getNom(),
            ':prenom' => $c->getPrenom(),
            ':email' => $c->getEmail(),
            ':dateNaissance' => $c->getDateNaissance(),
            ':dateInscription' => $c->getDateInscription()
        ]);
    }

    public function selectAll(): array {
        $clients = [];

        $sql = "SELECT * FROM clients ORDER BY nom ASC";
        $stmt = $this->pdo->query($sql);

        while ($row = $stmt->fetch()) {
            $c = new EntiteClient();
            $c->setNom($row['nom']);
            $c->setPrenom($row['prenom']);
            $c->setEmail($row['email']);
            $c->setDateNaissance($row['dateNaissance']);
            $c->setDateInscription($row['dateInscription']);
            $clients[] = $c;
        }

        return $clients;

    }

   
    
}
    

