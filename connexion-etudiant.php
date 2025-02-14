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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //recupération des données du formulaire
    $description = $_POST["description"];
    $date_echeance = $_POST["date_echeance"];
    $etat_de_tache = $_POST["etat_de_tache"];
    $assignation = $_POST["assignation"];
    $priorite = $_POST["priorite"];
    $commentaire = $_POST["commentaire"];

    //insertion des données dans la table "etudiant"
    $requete = "INSERT INTO `tache`( `description`, `date_echeance`, `etat_de_tache`, `assignation`, `priorite`, `commentaire`) VALUES ('$description', '$date_echeance', '$etat_de_tache', '$assignation', '$priorite','$commentaire')";
    $resultat = mysqli_query($conn, $requete); 

    if($resultat){
        echo "<script>alert('Ajout de l\'étudiant reussi !!!')</script>";
        header("location:admin.php");
    } else {
        echo "Erreur: " . $requete . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>