<?php
//connexion a la base de données My Sql
$servername="localhost";
$username= "root";
$password="";
$dbname="ecole";

$conn= mysqli_connect($servername, $username, $password, $dbname);

//verification de la connexion
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

// Construire la requête SQL
$user_id = $_GET["user_id"];

$requete = "DELETE FROM users WHERE user_id = '$user_id'";

$resultat = mysqli_query($conn, $requete);

// Exécuter la requête SQL
if($resultat){
    echo "<script>alert('Toutes les données ont été supprimées avec succès !!!')</script>";
        header("location:../../page-users.php");
} else {
    echo "Erreur lors de la suppression des données: " .mysqli_error($conn);
}

// Fermer la connexion
mysqli_close($conn);

?>