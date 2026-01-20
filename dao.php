<?php
require_once __DIR__ . '/../Connect.php';  
require_once __DIR__ . '/../tools.php'; // 
require_once __DIR__ . '/Entite/Entiteabonnement.php';


//
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}


class DAO {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Connect::connect();
    }

    public function insertClient(EntiteClient $c): bool {
        $sql = "INSERT INTO clients (nom, prenom, email, dateNaissance, dateInscription)
                VALUES (:nom, :prenom, :email, :dateNaissance, :dateInscription)";
        try {
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([
        ':nom' => Tools::clearString($c->getNom()),
        ':prenom' => Tools::clearString($c->getPrenom()),
        ':email' => Tools::clearString($c->getEmail()),
        ':dateNaissance' => $c->getDateNaissance(),
        ':dateInscription' => $c->getDateInscription()
    ]);
} catch (PDOException $e) {
    echo " Erro ao inserir client: " . $e->getMessage();
    return false;
}

    }

    public function insertVoiture(EntiteVoiture $v): bool {
        $sql = "INSERT INTO voiture (immatriculation, couleur, poids, puissance, capaciteReservoir, niveauEssence, nbPlaces, assure, message)
                VALUES (:immatriculation, :couleur, :poids, :puissance, :capaciteReservoir, :niveauEssence, :nbPlaces, :assure, :message)";
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':immatriculation' => $v->getImmatriculation(),
                ':couleur' => $v->getCouleur(),
                ':poids' => $v->getPoids(),
                ':puissance' => $v->getPuissance(),
                ':capaciteReservoir' => $v->getCapaciteReservoir(),
                ':niveauEssence' => $v->getNiveauEssence(),
                ':nbPlaces' => $v->getNbPlaces(),
                ':assure' => $v->estAssure(),
                ':message' => $v->getMessage()
            ]);
        } catch (PDOException $e) {
            echo " Erro ao inserir voiture: " . $e->getMessage();
            return false;
        }
    }
// insertion de entitentclient
    public function updateDatas(EntiteClient $client): bool {
    $sql = "
        UPDATE clients SET
            nom = :nom,
            prenom = :prenom,
            email = :email,
            dateNaissance = :dateNaissance,
            dateInscription = :dateInscription
        WHERE id = :id
    ";

    try {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => Tools::clearString($client->getNom()),
            ':prenom' => Tools::clearString($client->getPrenom()),
            ':email' => strtolower($client->getEmail()),
            ':dateNaissance' => $client->getDateNaissance(),
            ':dateInscription' => $client->getDateInscription(),
            ':id' => $client->getId()
        ]);
    } catch (PDOException $e) {
        echo " Erreur ao actualizar le cliente: " . $e->getMessage();
        return false;
    }
}

// updadeclient 
public function updateClient(EntiteClient $c): bool {
    $sql = "UPDATE clients SET nom = :nom, prenom = :prenom, email = :email,
            dateNaissance = :dateNaissance, dateInscription = :dateInscription
            WHERE id = :id";

    try {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => Tools::clearString($c->getNom()),
            ':prenom' => Tools::clearString($c->getPrenom()),
            ':email' => strtolower($c->getEmail()),
            ':dateNaissance' => $c->getDateNaissance(),
            ':dateInscription' => $c->getDateInscription(),
            ':id' => $c->getId()
        ]);
    } catch (PDOException $e) {
        echo " Erreur ao actualiser le client: " . $e->getMessage();
        return false;
    }
}

// delete client
public function deleteClient(int $id): bool {
    $sql = "DELETE FROM clients WHERE id = :id";

    try {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    } catch (PDOException $e) {
        echo " Erreur ao deletar client: " . $e->getMessage();
        return false;
    }
}
// ===== Abonnements =====

public function insertAbonnement(EntiteAbonnement $a): bool {
    $sql = "INSERT INTO abonnements (idClient, dateDebut, dateFin)
            VALUES (:idClient, :dateDebut, :dateFin)";
    try {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idClient' => $a->getIdClient(),
            ':dateDebut' => $a->getDateDebut(),
            ':dateFin' => $a->getDateFin()
        ]);
    } catch (PDOException $e) {
        echo "❌ Erreur lors de l'insertion de l'abonnement: " . $e->getMessage();
        return false;
    }
}

public function selectAllAbonnements(): array {
    $abonnements = [];
    try {
        $stmt = $this->pdo->query("SELECT * FROM abonnements ORDER BY dateDebut DESC");
        while ($row = $stmt->fetch()) {
            $a = new EntiteAbonnement();
            $a->setId($row['id']);
            $a->setIdClient($row['idClient']);
            $a->setDateDebut($row['dateDebut']);
            $a->setDateFin($row['dateFin']);
            $abonnements[] = $a;
        }
    } catch (PDOException $e) {
        echo "❌ Erreur lors de la récupération des abonnements: " . $e->getMessage();
    }
    return $abonnements;
}


}
