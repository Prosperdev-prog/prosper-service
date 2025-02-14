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
    $Matricule = $_POST["Matricule"];
    $codefil = $_POST["codefil"];
    $codeSP = $_POST["codeSP"];
    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $Tel = $_POST["Tel"];

    //insertion des données dans la table "etudiant"
    $requete = "INSERT INTO etudiant (`Matricule`, `codefil`, `codeSP`, `Nom`, `Prenom`, `Tel`) VALUES ('$Matricule', '$codefil', '$codeSP', '$Nom','$Prenom', '$Tel')";
    $resultat = mysqli_query($conn, $requete);

    if($resultat){
        echo "<script>alert('Ajout de l\'étudiant reussi !!!')</script>";
        header("location:etudiant.php");
    } else {
        echo "Erreur: " . $requete . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>