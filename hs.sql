CREATE DATABASE IF NOT EXISTS `ParcAuto`;
  
  
  CREATE TABLE voiture (
    id INT PRIMARY KEY AUTO_INCREMENT,
    immatriculation VARCHAR(20) unique  NOT NULL,
    couleur VARCHAR(20),
    poids FLOAT,
    puissance INT,
    capaciteReservoir FLOAT,
    niveauEssence FLOAT DEFAULT 5.0,
    nbPlaces INT,
    assure BOOLEAN DEFAULT FALSE,
    message TEXT DEFAULT 'Bienvenue à bord !'
);
