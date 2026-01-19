<?php
class EntiteClient {
    private string $nom;
    private string $prenom;
    private string $email;
    private string $dateNaissance;
    private string $dateInscription;

    public function setNom(string $v): void { $this->nom = $v; }
    public function getNom(): string { return $this->nom; }

    public function setPrenom(string $v): void { $this->prenom = $v; }
    public function getPrenom(): string { return $this->prenom; }

    public function setEmail(string $v): void { $this->email = $v; }
    public function getEmail(): string { return $this->email; }

    public function setDateNaissance(string $v): void { $this->dateNaissance = $v; }
    public function getDateNaissance(): string { return $this->dateNaissance; }

    public function setDateInscription(string $v): void { $this->dateInscription = $v; }
    public function getDateInscription(): string { return $this->dateInscription; }
}
