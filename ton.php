<?php
include 'connexion.php';
$nom= $_POST['nom'];
$req = $cnx->prepare("SELECT * from ajout_pizza WHERE nom=:nom");
$req->execute(array('nom'->$nom)); 

$pizza = $req->fetchAll(); 

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
            <li> <a href="index.html">Accueil</a></li>
            <li> <a href="#">A propos</a></li>
            <li> <a href="menu.html">Menu</a></li>
            <li> <a href="expert.html">Expert</a></li>
            <li> <a href="client.html">Temoignage</a></li>
            <li> <a href="contact.html">Contact</a></li>
            <a href="reservation.html" class="btn-reservation"> Reservation</a>
        </ul>
    </header>
    
                 
    
   <div class="contenu-mar">
       <div class="box-mar">
      
        <div class ="text-mar">
        
            <h3>thon</h3>
        </div>
           <div class="imbox-mar">
               <img src="./images/thon.jpg" alt=""> 
           </div>
           <div class ="description">
               <?php
               foreach ($pizza as $item) { 
                   ?>
          
               <p> <?php echo $item['description']; ?> </p>
               <?php
               }
               ?>
               </div>
               <div class="prix">
                <p> Individuelle : <span>8.9dt </span>  Double: <span>17.9dt </span> Triple :<span>24.9dt</span></p>
            </div>
               
           </div>
           
       </div>
       </div>

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