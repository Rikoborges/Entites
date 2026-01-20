<?php

class EntiteAbonnement {
    private int $id;
    private int $idClient;
    private string $dateDebut;
    private string $dateFin;

    public function __construct() {
        $this->id = 0;
        $this->idClient = 0;
        $this->dateDebut = "";
        $this->dateFin = "";
    }

    // SETTERS
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setIdClient(int $idClient): void {
        $this->idClient = $idClient;
    }

    public function setDateDebut(string $dateDebut): void {
        $this->dateDebut = $dateDebut;
    }

    public function setDateFin(string $dateFin): void {
        $this->dateFin = $dateFin;
    }

    // GETTERS
    public function getId(): int {
        return $this->id;
    }

    public function getIdClient(): int {
        return $this->idClient;
    }

    public function getDateDebut(): string {
        return $this->dateDebut;
    }

    public function getDateFin(): string {
        return $this->dateFin;
    }
}

?>
