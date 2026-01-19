<?php
require_once 'Connect.php';
require_once 'EntiteClient.php';

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
            'nom' => $c->getNom(),
            'prenom' => $c->getPrenom(),
            'email' => $c->getEmail(),
            'dateNaissance' => $c->getDateNaissance(),
            'dateInscription' => $c->getDateInscription()
        ]);
    }
}
