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

// Gestion de la soumission du formulaire
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $conn->real_escape_string($_POST['nom']);
    $prenom = $conn->real_escape_string($_POST['prenom']);
    $email = $conn->real_escape_string($_POST['email']);
    $probleme = $conn->real_escape_string($_POST['probleme']);

    $sql = "INSERT INTO contact (nom, prenom, email, problème) VALUES ('$nom', '$prenom', '$email', '$probleme')";

    if ($conn->query($sql) === TRUE) {
        $message = "Votre message a été envoyé avec succès.";
    } else {
        $message = "Erreur : " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
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

    <!-- Formulaire de contact -->
    <div class="container">
        <h1 class="my-4">Contactez-nous</h1>
        
        <!-- Message de succès ou d'erreur -->
        <?php if ($message) : ?>
            <div class="alert alert-info"><?= $message; ?></div>
        <?php endif; ?>

        <form action="contact.php" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="probleme">Problème :</label>
                <textarea class="form-control" id="probleme" name="probleme" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>
</html>
    