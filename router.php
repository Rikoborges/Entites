<?php
// Affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusão dos arquivos necessários
require_once __DIR__ . '/DAO/dao.php';
require_once __DIR__ . '/EntiteClient.php';
require_once __DIR__ . '/EntiteVoiture.php';
require_once __DIR__ . '/../tools.php'; //


//
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? '';

    $dao = new DAO();

    if ($tipo === 'client') {
        $c = new EntiteClient();
        $c->setNom($_POST['nom'] ?? '');
        $c->setPrenom($_POST['prenom'] ?? '');
        $c->setEmail($_POST['email'] ?? '');
        $c->setDateNaissance($_POST['dateNaissance'] ?? '');
        $c->setDateInscription($_POST['dateInscription'] ?? '');

        if ($dao->insertClient($c)) {
            echo "✅ Client inséré avec succès !";
        } else {
            echo "❌ Erreur lors de l'insertion du client.";
        }

    } elseif ($tipo === 'voiture') {
        $v = new EntiteVoiture();
        $v->setImmatriculation($_POST['immatriculation'] ?? '');
        $v->setCouleur($_POST['couleur'] ?? '');
        $v->setPoids((float)($_POST['poids'] ?? 0));
        $v->setPuissance((int)($_POST['puissance'] ?? 0));
        $v->setCapaciteReservoir((float)($_POST['capaciteReservoir'] ?? 0));
        $v->setNiveauEssence((float)($_POST['niveauEssence'] ?? 5.0));
        $v->setNbPlaces((int)($_POST['nbPlaces'] ?? 0));
        $v->setAssure(isset($_POST['assure']));
        $v->setMessage($_POST['message'] ?? 'Bienvenue à bord !');

        if ($dao->insertVoiture($v)) {
            echo "✅ Voiture insérée avec succès !";
        } else {
            echo " Erreur lors de l'insertion de la voiture.";
        }

    } else {
        echo " Type d'entité inconnu.";
    }
} else {
    echo " Requête non autorisée.";
}

$dao = new DAO();
$abonnement = new EntiteAbonnement();
$abonnement->setIdClient(3);
$abonnement->setDateDebut('2024-01-01');
$abonnement->setDateFin('2024-12-31');

$dao->insertAbonnement($abonnement);

