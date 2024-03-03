<?php
include 'connexion.php';
$email= $_POST['email'];
$password = md5($_POST['password']);

$req = $cnx->prepare("SELECT * from inscri where email='$email' and mdp='$password'");
$req->execute(array()); 
$user = $req->fetchAll(); 

if(isset($_POST['save']))
{

if(is_array($user) && count($user)>0){
    session_start();
    foreach ($user as $item) { 
    $_SESSION['id']=$item['id']; 
    $_SESSION['email']=$email;
    $_SESSION['mdp']=$password;
    }
    header('location:index.php');
}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Restaurent</title>
</head>
<body>
    <header>
        <a href ="#" class="logo-menu"> Mia'<span>P</span>izza</a>
        <ul class="navbar-menu">
            <li> <a href="index.php">Accueil</a></li>
            <li> <a href="menu.html">Menu</a></li>
            <?php if(isset($_SESSION['email'])){
          print '<li> <a href="panier.php">Panier('.count($_SESSION['panier'][3]).')</a></li>';
            } else {
                print ' <li> <a href="login-client.php">Connexion</a></li>
               <a href="inscription.php" class="btn-reservation"> Inscription</a>';
            
        }?>
        </ul>
    </header>
    <form action="login-client.php" method="post">
<section class="contact-c">
    <div class="titre noir">
        <h2 class="titre-text"> </h2>
    </div>
<div class="contactform">
   <div class="inputboite">
      
    <div class="inputboite">
        <input type="mail" name="email" placeholder="Email">
    </div>
    <div class="inputboite">
        <input type="password" name="password" placeholder="Mot de passe" required>
    </div>
<div class="inputboite">
    <input type="submit" value="connecter " name="save">
</div>
</div>
</form>

</section>

    <script type="text/javascript">
        window.addEventListener('scroll', function(){
            const header =document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0 );
        });
    
        </script>
    </body>
    </html>