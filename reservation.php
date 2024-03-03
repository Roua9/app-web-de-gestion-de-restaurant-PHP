<?php
include 'connexion.php';
session_start();
if(isset($_POST['ajout']))
{
$nom= $_POST['nom'];
$nbr = $_POST['nbr'];
$date = $_POST['date'];
$heure = $_POST['heure'];

$req = $cnx -> prepare('INSERT INTO  reservation (id, nom, nombre, date, heure) VALUES(NULL, :nom, :nbr, :date, :heure)');
$req->execute(array('nom'=>$nom,'nbr'=>$nbr,'date'=>$date ,'heure'=>$heure)); 
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
    <a href ="#" class="logo">Mia'<span>P</span>izza</a>
        <ul class="navbar">
            <li> <a href="index.php">Accueil</a></li>
            <li> <a href="index.php">Menu</a></li>

            <?php if(isset($_SESSION['email'])){
                if(isset($_SESSION['panier']) && is_array($_SESSION['panier'][3])){
          print '<li> <a href="panier.php">Panier(<span class="text-warning">'.count($_SESSION['panier'][3]).'</span>)</a></li>';
          print '<li> <a href="deconnexion.php">Déconnexion</a></li>';
        } else {
            print '<li> <a href="panier.php">Panier(<span>0</span>)</a></li>';
            print '<li> <a href="deconnexion.php">Déconnexion</a></li>';
        } }
        else {
                print ' <li> <a href="login-client.php">Connexion</a></li>
               <a href="inscription.php" class="btn-reservation"> Inscription</a>';
        
        }?>
            
        </ul>
    </header>

<section class="reservation">
    <div class="titre noir">
        <h2 class="titre-text"><span>R</span>eservation</h2>
    </div>
<div class="contactform">
<form method="post" action="">
<div class="inputboite">
       <input type="text" name="nom" placeholder="nom">
    </div>
   <div class="inputboite">
       <input type="number" name="nbr" placeholder="Nombre de personne">
    </div>
    <div class="inputboite">
        <input type="date" name="date" placeholder="Date">
    </div>
    <div class="inputboite">
        <input type="time" name="heure" placeholder="Heure">
    </div>
<div class="inputboite">
    <input type="submit" name="ajout" value="envoyer">
</div>

</div>
</form>
</section>


<footer class ="copyright">
    <div >
        <p>© 2021 Mia'<span>P</span>izza Tunisia. All Rights Reserved !</p>
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