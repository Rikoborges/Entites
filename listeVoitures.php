<?php
require_once __DIR__ . '/DAOVoiture.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dao = new DAOVoiture();
$voitures = $dao->selectAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Voitures</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 95%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .yes {
            color: green;
        }

        .no {
            color: red;
        }
        .btn-retour {
    margin-top: 30px;
    display: inline-block;
    padding: 10px 18px;
    background-color: #e0e0e0;
    color: #2c3e50;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}
.btn-retour:hover {
    background-color: #d0d0d0;
}

    </style>
</head>
<body>

<h1>🚗 Liste des Voitures Enregistrées</h1>

<table>
    <thead>
        <tr>
            <th>Immatriculation</th>
            <th>Couleur</th>
            <th>Poids</th>
            <th>Puissance</th>
            <th>Réservoir</th>
            <th>Niveau Essence</th>
            <th>Places</th>
            <th>Assuré</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($voitures as $v): ?>
            <tr>
                <td><?= htmlspecialchars($v->getImmatriculation()) ?></td>
                <td><?= htmlspecialchars($v->getCouleur()) ?></td>
                <td><?= $v->getPoids() ?> kg</td>
                <td><?= $v->getPuissance() ?> CV</td>
                <td><?= $v->getCapaciteReservoir() ?> L</td>
                <td><?= $v->getNiveauEssence() ?> L</td>
                <td><?= $v->getNbPlaces() ?></td>
                <td class="<?= $v->estAssure() ? 'yes' : 'no' ?>">
                    <?= $v->estAssure() ? 'Oui' : 'Non' ?>
                </td>
                <td><?= htmlspecialchars($v->getMessage()) ?></td>
            </tr>
            <a href="index.php" class="btn-retour">⬅ Retour à l'accueil</a>

        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
