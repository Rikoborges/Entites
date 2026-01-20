<?php
class EntiteClient {
    private int $id; //
    private string $nom;
    private string $prenom;
    private string $email;
    private string $dateNaissance;
    private string $dateInscription;

    // NOVO: Getter e Setter para ID
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setDateNaissance(string $dateNaissance): void {
        $this->dateNaissance = $dateNaissance;
    }

    public function getDateNaissance(): string {
        return $this->dateNaissance;
    }

    public function setDateInscription(string $dateInscription): void {
        $this->dateInscription = $dateInscription;
    }

    public function getDateInscription(): string {
        return $this->dateInscription;
    }
}
