<?php
class EntiteVoiture {
    private string $immatriculation;
    private string $couleur;
    private float $poids;
    private int $puissance;
    private float $capaciteReservoir;
    private float $niveauEssence;
    private int $nbPlaces;
    private bool $assure;
    private string $message;

    public function getImmatriculation(): string { return $this->immatriculation; }
    public function setImmatriculation(string $v): void { $this->immatriculation = $v; }

    public function getCouleur(): string { return $this->couleur; }
    public function setCouleur(string $v): void { $this->couleur = $v; }

    public function getPoids(): float { return $this->poids; }
    public function setPoids(float $v): void { $this->poids = $v; }

    public function getPuissance(): int { return $this->puissance; }
    public function setPuissance(int $v): void { $this->puissance = $v; }

    public function getCapaciteReservoir(): float { return $this->capaciteReservoir; }
    public function setCapaciteReservoir(float $v): void { $this->capaciteReservoir = $v; }

    public function getNiveauEssence(): float { return $this->niveauEssence; }
    public function setNiveauEssence(float $v): void { $this->niveauEssence = $v; }

    public function getNbPlaces(): int { return $this->nbPlaces; }
    public function setNbPlaces(int $v): void { $this->nbPlaces = $v; }

    public function estAssure(): bool { return $this->assure; }
    public function setAssure(bool $v): void { $this->assure = $v; }

    public function getMessage(): string { return $this->message; }
    public function setMessage(string $v): void { $this->message = $v; }
}
