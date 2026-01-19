<?php
require_once 'Connect.php';
require_once 'EntiteVoiture.php';

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
            'immatriculation'   => $v->getImmatriculation(),
            'couleur'           => $v->getCouleur(),
            'poids'             => $v->getPoids(),
            'puissance'         => $v->getPuissance(),
            'capaciteReservoir' => $v->getCapaciteReservoir(),
            'niveauEssence'     => $v->getNiveauEssence(),
            'nbPlaces'          => $v->getNbPlaces(),
            'assure'            => $v->estAssure(),
            'message'           => $v->getMessage()
        ]);
    }

    public function selectAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM voiture ORDER BY id DESC");
        return $stmt->fetchAll();
    }
}
