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

if (isset($_GET['user_id']) && !empty($_GET['user_id'])){

        // Construire la requête SQL
        $user_id = $_GET["user_id"];
        $requete = "SELECT * FROM users WHERE user_id = '$user_id'";
        $resultat = mysqli_query($conn, $requete);

        // Exécuter la requête SQL
        if($resultat-> num_rows > 0) {
            $users = $resultat-> fetch_assoc();
            
        } else {
            header("location:..\..\page-users.php");
        }
        
}else {
    header("location:..\..\page-users.php");
}
//$requete = "SELECT FROM * etudiant WHERE Matricule = '$Matricule'";
//$row_etudiant = mysqli_query($conn, $requete);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Modifier ici</title>
	<link rel="stylesheet" type="text/css" href="">
    <style>
        body{
        height: 100vh;
        width: 100vw;
        overflow: hidden;
        background: #000428;
        }

        .container {
        background: #fff;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 5px 5px 5px rgba(0,0,0, 0.5) ;
        flex-wrap: wrap;
        border-radius: 15px;
        border: 5px solid #ccc;
        align-items: center;
        }

        h2 {
            margin-top: 10px;
            text-align: center;
        }

        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
        }

        form{
            height: 100%;
            width: 95%;
        }

        input[type="text"] {
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        input[type="number"] {
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        select {
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .btn{
            text-align: center;
        }

        button[type="submit"] {
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            background-color: #000428;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button[type="reset"] {
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            background-color: #000428;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
	<div class="container">
		<h2>Modifier une donnée</h2>
		<form action="modifier.php" method="post">

        <div class="input-group">
                        <label for="floatingPassword">Nom d'utilisateur :</label>
                        <input type="text" name="user_name" required VALUE="<?=$users['user_name'] ?>" ><br><br>
                    </div>

                    <div class="input-group">
                        <label for="floatingPassword">Votre email :</label>
                        <input type="email" name="user_email" required VALUE="<?=$users['user_email'] ?>" ><br><br>
                    </div>

                    <div class="input-group">
                        <label for="floatingPassword">Statut :</label>
                        <input type="text" name="statut" required VALUE="<?=$users['statut'] ?>" ><br><br>
                    </div>

                
                    <div class="btn">
                        <button type="reset">ANNULER</button>
                        <button type="submit">MODIFIER</button>
                    </div>

		</form>
	</div>
</body>
</html>