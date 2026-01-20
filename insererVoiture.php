<?php
require_once __DIR__ . '/DAOClient.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dao = new DAOClient();
$clients = $dao->selectAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Clients</title>
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
            width: 80%;
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
            background-color: #2ecc71;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>👤 Liste des Clients Enregistrés</h1>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date de Naissance</th>
            <th>Date d'inscription</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c->getNom()) ?></td>
                <td><?= htmlspecialchars($c->getPrenom()) ?></td>
                <td><?= htmlspecialchars($c->getEmail()) ?></td>
                <td><?= htmlspecialchars($c->getDateNaissance()) ?></td>
                <td><?= htmlspecialchars($c->getDateInscription()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
