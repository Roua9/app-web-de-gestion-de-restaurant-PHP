<?php
session_start();
if (isset($_POST['valider'])){
    if(!empty($_POST['login']) and !empty($_POST['pwd'])){
        $login_defaut="admin";
        $pwd_defaut="admin123";


        $login_saisi=htmlspecialchars($_POST['login']);
        $pwd_saisi=htmlspecialchars($_POST['pwd']);

        if($login_saisi == $login_defaut and $pwd_saisi == $pwd_defaut){
            $_SESSION['pwd']=$pwd_saisi;
            header('location: index_admin.php');

        }else{
            
            echo  "<script> alert (\"Votre login ou mot de passe est incorrect\") </script>";

        }
    }else{
        echo "<script> alert (\"veuillez compléter tous les champs...!\") </script>";
    }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Mia'Pizza Admin</title>

  <!-- Favicons -->
  <link href="img/img-form.jpg" rel="icon">
  <link href="img/img-form.jpg" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="post">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="login" name="login" autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="pwd">
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" href="index.html" type="submit" name="valider"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
        
        </div>
   
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/log.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
