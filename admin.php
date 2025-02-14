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

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tache</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- font-awesome  File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.php">PROSPER SERVICE</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li><a href="index.php">ACCEUIL</a></li>
          <li><a href="signup.php">AJOUTER DES TACHES</a></li>
          <li><a class="active" href="admin.php">VOIR LES TACHES</a></li>
          <li><a href="connexion.php">CREER UN COMPTE</a></li>
          <!--<li><a href="trainers.html">Trainers</a></li>
          <li><a href="events.html">Events</a></li>
          <li><a href="pricing.html">Pricing</a></li>-->
          <!--
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <!--<li><a href="contact.html">Contact</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="courses.html" class="get-started-btn">SIGN UP</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <main id="main">

    <!-- ======= About Section ======= -->

    <div class="container mt-5">
    <div class="breadcrumbs">
      <div class="container">
        <h1>Tableau d'informations</h1>
      </div>
    </div><!-- End Breadcrumbs -->
      
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Description</th>
                  <th>Date d'écheance</th>
                  <th>Etat de la Tache</th>
                  <th>Categorie</th>
                  <th>Priorité</th>
                  <th>Commentaire</th>
    
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
            //Affichage de données sous forme de tableau
                $select_etudiant = "SELECT * from tache";
                $result_etudiant = $conn->query($select_etudiant);

                if($result_etudiant->num_rows > 0){
                    while($row_etudiant = $result_etudiant->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $row_etudiant['description']?></td>
                    <td><?= $row_etudiant['delai_tache']?></td>
                    <td><?= $row_etudiant['etat_de_tache']?></td>
                    <td><?= $row_etudiant['assignation']?></td>
                    <td><?= $row_etudiant['priorite']?></td>
                    <td><?= $row_etudiant['commentaire']?></td>
          
          
                    <td>
                    <a href="supprimer.php?id=<?php echo($row_etudiant['id_tache'])?>" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> 
                    </a>


                    <a href="update.php?id=<?= $row_etudiant['id_tache']?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i> 
                    </a>
                </td>
                </tr>
                <?php
                    } 
                } else {
                }
                ?>
              
          </tbody>
      </table>
  </div>

    

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
        </div>
                <!--  <div class="credits"> -->
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                  <!--  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                 <!-- </div> -->
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>