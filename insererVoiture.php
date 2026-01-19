<?php
require_once 'DAOVoiture.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $v = new EntiteVoiture();
    $v->setImmatriculation($_POST['immatriculation']);
    $v->setCouleur($_POST['couleur']);
    $v->setPoids((float)$_POST['poids']);
    $v->setPuissance((int)$_POST['puissance']);
    $v->setCapaciteReservoir((float)$_POST['capaciteReservoir']);
    $v->setNiveauEssence((float)$_POST['niveauEssence']);
    $v->setNbPlaces((int)$_POST['nbPlaces']);
    $v->setAssure(isset($_POST['assure']));
    $v->setMessage($_POST['message']);

    $dao = new DAOVoiture();
    if ($dao->insert($v)) {
        echo "✅ Voiture inserée com sucesso.";
    } else {
        echo "❌ Erro ao inserir.";
    }
}
