<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Parc Auto</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            justify-content: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 260px;
        }

        a {
            display: block;
            text-align: center;
            text-decoration: none;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #217dbb;
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

    <h1>🚘 Bienvenue dans le système Parc Auto</h1>

    <div class="menu">
        <a href="form.html">➕ Ajouter une voiture ou un client</a>
        <a href="listeVoitures.php">📋 Liste des voitures</a>
        <a href="listeClients.php">👥 Liste des clients</a>
    </div>

<a href="logout.php">🚪 Se déconnecter</a>

</body>
</html>
