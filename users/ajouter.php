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
    $user_name = htmlspecialchars($_POST['user_name']) ;
    $user_email = htmlspecialchars($_POST['user_email']);
    $statut = htmlspecialchars($_POST['statut']);
    $password_entrer = htmlspecialchars($_POST['password_entrer']);
    $password_confirm = htmlspecialchars($_POST['password_confirm']);
    //$admin = $_POST['admin'];

    //die(var_dump($user_name, $user_email, $statut) );
    if($password_entrer == $password_confirm) {

        $verif= " SELECT * FROM users WHERE user_email = '$user_email'";
        $result = mysqli_query($conn, $verif);
        
            if($result-> num_rows > 0) {

                die("l'utilisateur existe déjà");

                
        } else {
           // die("l'utilisateur nouvveau");

            //insertion des données dans la table "users"
            $requete = "INSERT INTO `users` (`user_name`, `user_email`, `statut`, `password` ) VALUES ('$user_name', '$user_email', '$statut', '$password_entrer')";
            $resultat = mysqli_query($conn, $requete);

            if($resultat){
                # code...
                echo "<script>alert('Ajout reussi !!!')</script>";
                $message = "inscription reussi, veuillez vous connecter";
                header("location:../../connexion.php?msg=$message");
            } else {
                echo "<script>alert('Ajout échoué !!!')</script>";
                header("location:../../page-users.php");
            }

        }




    }else {
        die("mot de passe incorect");
    }
    
}

?>