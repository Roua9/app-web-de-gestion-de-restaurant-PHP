<?php
include 'connexion.php';
session_start();
$req = $cnx->prepare("SELECT * from ajout_pizza");
$req->execute(array()); 
$pizza = $req->fetchAll(); 

$rq = $cnx->prepare("SELECT * from expert");
$rq->execute(array()); 
$expert = $rq->fetchAll(); 
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
    <section class="banniere" id="banniere">
        <div class="contenu">
            <h2>Que Des Plats Délicieux</h2>
            <!--<p> Mia'Pizza est l'un des plus grands restaurateurs de Pizza dans le monde.Référence incontestable de la qualité.</p>-->
            <a href="#menu" class="btn1">Notre Menu</a>
            <a href="reservation.php" class="btn2">Reservation</a>
        </div>
    </section>

    <section class="apropos" id="apropos">
        <div class="row">
            <div class="col50">
                <h2 class="titre-texte"><span>A</span> Propos De Nous</h2>
                <p>Mia'Pizza est une marque internationale qui s’adresse à des millions de personnes dans plus de 100 pays.
                     Chaque restaurant est spécifique mais vous y trouverez toujours des intérieurs modernes, une atmosphère unique, 
                     un service professionnel et le plus important : le goût inoubliable des pizzas.
                </p>
            </div>
            <div class="col50">
                <div class="img">
                    <img src="./images/calzone.jpg" alt="image">
                </div>
            </div>
        </div>
    </section>
    <section class="food-menu" id="menu">
         <h2 class="titre-texte">  <span>M</span>enu</h2>
         <?php
         foreach ($pizza as $item) { 
            ?>
         <div class="container">
         <div class="food-menu-box">
         <div class="food-menu-img">
                 <?php echo '<img src="images/'.$item['image'].'" width="200" height="200"> </img>' ?>
                </div>
                <div class="food-menu-desc">

                   <h3> <?php echo $item['nom']; ?></h3>

                   <p class="food-price"> <?php echo $item['prix']; ?></p>
                   <p class="food-detail"><?php echo $item['description']; ?></p>
                  <br>
                  <form action="actions/commander.php" method="post">
                  <input type="hidden" value="<?php echo $item['id']; ?>" name="produit" >
                  <input type="number" class="form-control" name="quantite" step="1" placeholder="quantité" style="width:66px">
                  <br>
                  <br>
                   <button type="submit" class="btn btn-primary"> Commander</button>

                   <div id="stars">
                       <span> &#9734 </span> <span> &#9734 </span> <span> &#9734 </span> <span> &#9734 </span> <span> &#9734 </span>

         </div>
         </form>
                </div>
                </div>
                <?php
                 }
                 ?>
                 
                 </div>
                 </section>
     

    <section class="expert" id ="expert">
        <div class="titre">
            <h2 class="titre-texte"> Nos <span>E</span>xpert</h2>
        </div>
        
       <div class="contenu">
       <?php
         foreach ($expert as $item) { 
            ?>
           <div class="box">
               <div class="imbox">
                   <!--<img src="./images/equipe1.jpg" alt=""> -->
                   <?php echo '<img src="'.$item['image'].'" width="200" height="200"> </img>' ?>
               </div>
               <div class ="text">
                   <h3><?php echo $item['nom']; ?></h3>
               </div>
               
           </div>
 
           <?php
                 }
                 ?>
 </div>

 </section>
 <section class="temoignage" id ="temoignage">
    <div class="titre blanc">
        <h2 class="titre-texte"> Que disent Nos <span>C</span>lients</h2>
    </div>
   <div class="contenu">
       <div class="box">
           <div class="imbox">
               <img src="./images/t1.jpeg" alt=""> 
           </div>
           <div class ="text">
               <p>Hier 28 Août à midi, j'ai passé un excellent moment dans votre restaurant. 
                   Le service est impeccable, la terrasse agréable, le repas excellent ,
                    les prix raisonnables. Je n'hésiterai pas à recommander votre établissement.</p>
                    <h3>Béné</h3>
           </div>
       </div>
       <div class="box">
        <div class="imbox">
            <img src="./images/t2.jpg" alt="">
        </div>
        <div class="text">
            <p>  Cuisine fine alliant tradition et le soupçon d'originalité qui font que l'on se sent bien.
                 Et on y est bien traité. Addition très raisonnable à comparer les restaux de tunisie dans 
                 la même catégorie. Cadre de qualité bien décoré</p>
            <h3>Lylybop</h3>
        </div>
    </div>
    <div class="box">
        <div class="imbox">
            <img src="./images/t3.jpg" alt="">
        </div>
        <div class="text">
            <p> Restaurant trouvé un peu par hasard sur internet, mais le hasard fait
                 quelquefois bien les choses un amuse bouche (tres bon) dans un repas
                  de midi (formule entrée + plat), des plats suffisament copieux, originaux et tres bons.
                  .</p>
            <h3>Martine Seon</h3>
        </div>
    </div>
    <div class="box">
        <div class="imbox">
            <img src="./images/t4.jpg" alt="">
        </div>
        <div class="text">
            <p>De très bons plats très bien cuisinés avec des produits de qualité du terroir.
                 L'île flottante est unique. On fleurte avec le niveau gastronomique. 
                 Un rapport qualité prix incroyable en comparaison avec ceux de la cote d'azur. 
                 Un cadre sympa décontracté et lumineux. Le service est attentionné et professionnel.</p>
            <h3>J-Pierre D</h3>
        </div>
    </div>
</div>
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