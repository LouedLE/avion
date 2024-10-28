<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avion"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupération des données de la table avion
$sql = "SELECT id, nom, vitesse, moteur, image FROM avion";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations sur les avions</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
</head>
<body>
    <!-- Header avec logo et barre de navigation -->
    <header class="container-fluid">
        <div class="logo">
            <img src="img/logo.png" alt="Logo Avion" width="50" height="50">
            <span>Avion</span>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="nav-link">Accueil</a></li>
                <li><a href="informations.php" class="nav-link">Informations</a></li>
                <li><a href="contact.php" class="nav-link">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenu principal -->
    <div class="container">
        <h1 class="my-4">Liste des avions</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Vitesse</th>
                    <th>Moteur</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['vitesse']) . " km/h</td>";
                        echo "<td>" . htmlspecialchars($row['moteur']) . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['nom']) . "' width='100'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Aucun avion trouvé</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
