<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réponse du formulaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        .info {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #3498db;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sécurisation des données avec strip_tags()
        $civilite = strip_tags($_POST['civilite']);
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags($_POST['email']);
        $telephone = strip_tags($_POST['telephone']);
        $sujet = strip_tags($_POST['sujet']);
        $message = strip_tags($_POST['message']);
        $newsletter = isset($_POST['newsletter']) ? "Oui" : "Non";

        // Affichage des informations (méthode 1: HTML dans PHP)
        echo "<h1>Merci pour votre message !</h1>";
        echo "<div class='info'>";
        echo "<p><strong>Civilité :</strong> $civilite</p>";
        echo "<p><strong>Nom :</strong> $nom</p>";
        echo "<p><strong>Prénom :</strong> $prenom</p>";
        echo "<p><strong>Email :</strong> $email</p>";
        echo "<p><strong>Téléphone :</strong> $telephone</p>";
        echo "<p><strong>Sujet :</strong> $sujet</p>";
        echo "<p><strong>Newsletter :</strong> $newsletter</p>";
        echo "</div>";

        // Affichage du message (méthode 2: PHP dans HTML)
        ?>
        <h2>Votre message :</h2>
        <blockquote>
            <?php echo nl2br(htmlspecialchars($message)); ?>
        </blockquote>

        <?php
        // Message supplémentaire selon le sujet
        if ($sujet == "question") {
            echo "<p>Nous traiterons votre question dans les plus brefs délais.</p>";
        } elseif ($sujet == "probleme") {
            echo "<p>Notre équipe technique va examiner votre problème rapidement.</p>";
        }
    } else {
        echo "<p>Erreur : Aucune donnée reçue.</p>";
    }
    ?>
</body>
</html>