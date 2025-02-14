<?php

//connexion à la base de données MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecole";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//verification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //recuperation des données du formulaire
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date_echeance = mysqli_real_escape_string($conn, $_POST['date_echeance']);
    $etat_de_tache = mysqli_real_escape_string($conn, $_POST['etat_de_tache']);
    $assignation = mysqli_real_escape_string($conn, $_POST['assignation']);
    $priorite = mysqli_real_escape_string($conn, $_POST['priorite']);
    $commentaire = mysqli_real_escape_string($conn, $_POST['commentaire']);

    // Récupérer l'identifiant de la tâche à mettre à jour (assurez-vous de la façon dont vous le transmettez)
    $id_tache = $_POST['id'];

    // Mise à jour des données dans la table "tache"
    $requete = "UPDATE tache SET 
                date_echeance = '$date_echeance', 
                description = '$description', 
                etat_de_tache = '$etat_de_tache', 
                assignation = '$assignation', 
                priorite = '$priorite', 
                commentaire = '$commentaire' 
                WHERE id_tache = $id_tache";

    $resultat = mysqli_query($conn, $requete);

    if ($resultat) {
        echo "<script>alert('Les données ont été modifiées avec succès !!!')</script>";
        header('Refresh:0.1;url=admin.php');
    } else {
        echo "<script>alert('La modification a échoué !!!')</script>";
        header('Refresh:0.1;url=admin.php');
    }
}

?>