<?php 
public cass EntiteClient {

string $nom;
string $prenom
string $email
string $dateNaissance
string $dateInscription;


public function __construct() {
    $this -> nom = '';
    $this -> prenom = '';
    $this -> email = '';
    $this -> dateNaissance = '';
    $this -> dateInscription = '';
}

public setNom ($nom)                                { this -> nom = $nom;}
public setPrenom ($prenom )                         { $this ->prenom = $prenom;}
public setEmail ($email)                            {$this -> email = $email;}
public setDateNaissance ($dateNaissance)            { this -> dateNaissance = $dateNaissance;}
public setDateInscription ($dateInscription)        { this -> dateInscription = $dateInscription;}

public function  getNom() :string                     {retourn $this -> nom;}
public  function getPrenom() :string                  { retourn $this ->prenom = $prenom;}
public  function getEmail () :string                  { retourn $this -> email = $email;}
public  function getDateNaissance () :string          { retourn $this -> dateNaissance = $dateNaissance;}
public  function getDateInscription () : string       { retourn $this -> dateInscription = $dateInscription;}


}

?>