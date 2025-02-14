<?php
session_start();
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
    $user_email = htmlspecialchars($_POST['user_email']);
    $password_conn = htmlspecialchars($_POST['password_conn']);

        $verif= " SELECT * FROM users WHERE user_email = '$user_email'";
        $result = mysqli_query($conn, $verif);

            if($result-> num_rows === 1) {
                $users = $result-> fetch_assoc();

                $users['password'];

                //die(var_dump($password_conn, $users['password']) );

                //VERIFICATION DU MOT DE PASSE
                if($password_conn == $users['password']){
                    $_SESSION['user_id'] = $users['user_id'];
                    header('location:..\..\admin.php');
                }else{
                    die("mot de passe incorrect");
                }
                
        } else {
           die("l'utilisateur non trouvé");

        }


}

?>