<?php
require_once 'DAOVoiture.php';

$dao = new DAOVoiture();
$voitures = $dao->selectAll();

echo "<h2>Liste des voitures</h2><ul>";

foreach ($voitures as $v) {
    echo "<li>{$v['immatriculation']} - {$v['couleur']} - {$v['message']}</li>";
}

echo "</ul>";
