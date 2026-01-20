<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/Connect.php';
require_once __DIR__ . '/EntiteVoiture.php';

class DAOVoiture {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Connect::connect();
    }

    public function insert(EntiteVoiture $v): bool {
        $sql = "INSERT INTO voiture (
                    immatriculation, couleur, poids, puissance, 
                    capaciteReservoir, niveauEssence, nbPlaces, assure, message
                ) VALUES (
                    :immatriculation, :couleur, :poids, :puissance, 
                    :capaciteReservoir, :niveauEssence, :nbPlaces, :assure, :message
                )";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':immatriculation'    => $v->getImmatriculation(),
            ':couleur'            => $v->getCouleur(),
            ':poids'              => $v->getPoids(),
            ':puissance'          => $v->getPuissance(),
            ':capaciteReservoir'  => $v->getCapaciteReservoir(),
            ':niveauEssence'      => $v->getNiveauEssence(),
            ':nbPlaces'           => $v->getNbPlaces(),
            ':assure'             => $v->estAssure() ? 1 : 0,
            ':message'            => $v->getMessage()
        ]);
    }

    public function selectAll(): array {
        $voitures = [];

        $sql = "SELECT * FROM voiture ORDER BY immatriculation ASC";
        $stmt = $this->pdo->query($sql);

        while ($row = $stmt->fetch()) {
            $v = new EntiteVoiture();

            $v->setImmatriculation($row['immatriculation']);
            $v->setCouleur($row['couleur']);
            $v->setPoids($row['poids']);
            $v->setPuissance($row['puissance']);
            $v->setCapaciteReservoir($row['capaciteReservoir']);
            $v->setNiveauEssence($row['niveauEssence']);
            $v->setNbPlaces($row['nbPlaces']);
            $v->setAssure($row['assure']);
            $v->setMessage($row['message']);

            $voitures[] = $v;
        }

        return $voitures;
    }
}
