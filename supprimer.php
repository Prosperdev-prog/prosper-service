<?php
// Connexion à la base de données MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecole";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Vérification de la présence de id_tache
if (isset($_GET["id"])) {
    $tache_id = intval($_GET["id"]); // Assurez-vous que l'ID est un entier

    // Construire la requête SQL
    $requete = "DELETE FROM tache WHERE id_tache = ?";

    // Préparer la requête
    $stmt = mysqli_prepare($conn, $requete);
    mysqli_stmt_bind_param($stmt, "i", $tache_id); // Lier le paramètre

    // Exécuter la requête
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Toutes les données ont été supprimées avec succès !!!')</script>";
        header("Location: admin.php");
        exit(); // Terminez le script après la redirection
    } else {
        echo "Erreur lors de la suppression des données: " . mysqli_error($conn);
    }

    // Fermer la déclaration
    mysqli_stmt_close($stmt);
} else {
    echo "Aucun ID de tâche fourni.";
}

// Fermer la connexion
mysqli_close($conn);
?>