<?php
include 'connexion.php';

// Vérifier si le formulaire a été envoyé
if(isset($_POST['save']))
{

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$email= $_POST['email'];
$password = md5($_POST['password']);

try
{
$req = $cnx -> prepare('INSERT INTO inscri (id,nom,prenom,telephone,adresse,email,mdp) VALUES (NULL, :nom, :prenom, :telephone, :adresse, :email, :password)');
$req->execute(array('nom'=>$nom,'prenom'=>$prenom , 'telephone'=>$telephone , 'adresse'=>$adresse,'email'=>$email,
'password'=>$password)); 
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
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
            <li> <a href="index.html">Menu</a></li>
            <li> <a href="login-client.php">Connexion</a></li>
            <li> <a href="inscription.php" class="btn-reservation"> Inscription</a> <li>
        </ul>
    </header>
    <form action="" method="post">
<section class="contact">
    <div class="titre noir">
        <h2 class="titre-text">Inscription </h2>
    </div>
<div class="contactform">
   <div class="inputboite">
        <input type="text" name="nom" placeholder="Nom" required>
    </div>
    <div class="inputboite">
        <input type="text" name="prenom" placeholder="prénom" required>
    </div>
    <div class="inputboite">
        <input type="text" name="telephone" placeholder="téléphone" maxlength="8" required>
    </div>
    <div class="inputboite">
        <input type="text" name="adresse" placeholder="Adresse" required>
    </div>
    <div class="inputboite">
        <input type="mail" name="email" placeholder="Email">
    </div>
    <div class="inputboite">
        <input type="password" name="password" placeholder="Mot de passe" required>
    </div>
<div class="inputboite">
    <input type="submit" value="Inscription" name="save">
</div>
</div>
</form>

</section>


<footer class ="copyright">
    <div >
        <p>© 2021 Mia'<span>P</span>izza Tunisia. All Rights Reservedl</p>
    </div>
    </footer>
    <script type="text/javascript">
        window.addEventListener('scroll', function(){
            const header =document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0 );
        });
    
        </script>
    </body>
    </html>