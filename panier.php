<?php
session_start();
include '../connexion.php';
$total=0;
if(isset($_SESSION['panier'])){
$total=$_SESSION['panier'][1];}
$commandes=array();
if(isset($_SESSION['panier']) ){
    if(count($_SESSION['panier'][3]) > 0){
        $commandes=$_SESSION['panier'][3];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Restaurent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="row col-12 mt-4 p-5" style="margin-top:20%">
            <h1 class="titre-texte"><span>P</span>anier utilisateur</h1>
            <table class="table table-warning table-striped">
            <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php
       foreach ($commandes as $index => $commande){
           print '<tr>
           <th scope="row">'.($index+1).'</th>
           <td>'.$commande[5].'</td>
           <td>'.$commande[0].' piéces</td>
           <td>'.$commande[1].' DT</td>
           <td> <a href="actions/supp-produit.php?id='.$index.'" class="btn btn-danger"> Supprimer </a> </td>
         </tr>';

       }
      ?>
   
   
  </tbody>
</table>
<div class="text-end mt-3">
    <h3> Total:<?php echo  $total ; ?> DT</h3>
    <hr>
    <a href="actions/valider-panier.php" class="btn btn-Dark" style="width:100px"> valider</a>
    </div>
         
         
                </div>
               
  
      

<script type="text/javascript">
    window.addEventListener('scroll', function(){
        const header =document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0 );
    });

    </script>
</body>
</html>