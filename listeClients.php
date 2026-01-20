<?php
require_once 'Connect.php';
require_once 'DAOClient.php';
require_once 'entiteClient.php';

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
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #2b2d42;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #2b7cff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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
    <h1>Liste des Clients</h1>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date de Naissance</th>
            <th>Date d'inscription</th>
        </tr>

        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= htmlspecialchars($client->getNom()) ?></td>
                <td><?= htmlspecialchars($client->getPrenom()) ?></td>
                <td><?= htmlspecialchars($client->getEmail()) ?></td>
                <td><?= htmlspecialchars($client->getDateNaissance()) ?></td>
                <td><?= htmlspecialchars($client->getDateInscription()) ?></td>
            </tr>
            


        <?php endforeach; ?>
    </table>
</body>
</html>
