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
    # code...
    //recuperation des données du formulaire
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $statut = $_POST['statut'];

    // die(var_dump($id_boutique, $id_produit, $quantite_commande, $date_commande) );

    //insertion des données dans la table "boutique"
    $requete = "UPDATE users SET  user_name = '$user_name', user_email = '$user_email', statut = '$statut'";
    $resultat = mysqli_query($conn, $requete);

    if($resultat){
        # code...
        echo "<script>alert('les données ont été modifier avec succès !!!')</script>";
        header('refesh:0.1;url=..\..\page-users.php');
    } else {
        echo "<script>alert('la modification a échoué !!!')</script>";
        header('refesh:0.1;url=..\..\page-users.php');
    }
}

?>