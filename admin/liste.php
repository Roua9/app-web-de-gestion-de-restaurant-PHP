<?php
session_start();
include 'connexion.php';

$req = $cnx->prepare("SELECT i.nom , i.prenom , i.telephone , p.total , p.etat , p.date_creation , p.id from paniers p, inscri i where p.client=i.id");
$req->execute(array()); 
$paniers = $req->fetchAll(); 

$req = $cnx->prepare("SELECT a.nom , a.image , c.quantite , c.total , c.panier from commandes c , ajout_pizza a  where c.produit=a.id");
$req->execute(array()); 
$commandes = $req->fetchAll(); 

if(isset($_POST['sauvegarder'])){

$etat = $_POST['etat'];
$panier_id = $_POST['panier_id'];
$requete = $cnx -> prepare('UPDATE paniers SET etat = :etat WHERE id = :panier_id');
$requete->execute(array('etat'=>$etat,'panier_id'=>$panier_id)); 
}
////serach etat
function getPanierByEtat($paniers,$etat){
  $panierEtat = array();
  foreach($paniers as $p){
    if($p['etat'] == $etat){
      array_push($panierEtat,$p);
  }}
  return $panierEtat;
}


if(isset($_POST['btnsearch'])){
  $paniers = getPanierByEtat($paniers,$_POST['etat']);
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
  <title>Mia'Pizza</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Favicons -->
  
  <link href="img/img-form.jpg" rel="icon">
  <link href="img/img-form.jpg" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link  href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo">Mia'<span>P</span>izza</a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
            </ul>
          </li>


            <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.php">Logout</a></li>
        </ul>
      </div>
    </header>

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/admin.png" class="img-circle" width="80"></a></p>
          <h5 class="centered">Admin</h5>
          <li class="mt">
            <a class="active" href="index_admin.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="mt">
            <a class="active" href="clients.php">
              <i class="fa fa-users"></i>
              <span>Nos Clients</span>
              </a>
          </li>
          <li class="mt">
            <a class="active" href="pizza.php">
              <i class="fa fa-users"></i>
              <span>Nos Pizzas</span>
              </a>
          </li>
          <li class="mt">
            <a class="active" href="liste.php">
              <i class="fa fa-users"></i>
              <span>Paniers</span>
              </a>
          </li>

          <li class="mt">
            <a class="active" href="reservation_aff.php">
              <i class="fa fa-users"></i>
              <span>Réservation</span>
              </a>
          </li>
          <li class="mt">
            <a class="active" href="aff-expert.php">
              <i class="fa fa-users"></i>
              <span>Expert</span>
              </a>
          </li>
       
      
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>


    <section id="main-content">
      <section class="wrapper">
    <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
            <form method="post" action="">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Liste des paniers</h4>
                <hr>
                <div>
                <form action="<?php echo $SERVER['PHP_SELF'] ;?>" method="POST">
                  <div class="form-group d-flex">
                  <select name="etat" class="form-control ml-2 mr-2">
                  <option value="" >-- Choisir l'état -- </option>
                    <option value="en cours" >En Cours </option>
                    <option value="en livraison"> En livraison </option>
                    <option value="livraison terminee" >Livraison terminée </option>
                    </select>
                    <input type="submit" class="btn btn-dark" name="btnsearch" value="Chercher" />  

              </div>
</form>

                <thead>
                  <tr>
                    <th><i class="fa fa-group"></i> #</th>
                    <th class="hidden-phone"><i class="fa fa-female"></i> Client</th>
                    <th><i class="fa fa-money"></i> Total </th>
                    <th><i class="fa fa-list"></i> etat </th>
                    <th><i class="fa fa-calendar"></i> Date</th>
                    <th><i class="fa fa-cart-plus"></i> Actions</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                    
                <?php
                 $i=0;
                foreach ($paniers as $items) { 
                    $i++;
                ?>
                  <tr>
                 <td> <?php echo $i ?> </td>
                 <td> <?php echo $items['nom'].' '.$items['prenom']; ?> </td>
                 <td> <?php echo $items['total'].'DT'; ?> </td>
                 <td> <?php echo $items['etat']; ?> </td>
                 <td> <?php echo $items['date_creation']; ?> </td>
               
                  <td>
                  <?php print '<a data-bs-toggle="modal" data-bs-target="#Commandes'.$items['id'].'" class="btn btn-secondary">afficher
                   </a>'; ?> 
                  
                <?php  print '<a data-bs-toggle="modal" data-bs-target="#Traiter'.$items['id'].'" class="btn btn-info">traiter
            </a>'; ?> 
          
          </td>
        </tr>
      <?php } ?>
    
                </tbody>
              </table>
              </form>
  </div>
         <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>

  

<!-- Modal -->
<?php
foreach ($paniers as $items) { ?>
<div class="modal fade" id="Commandes<?php echo $items['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">la liste des commandes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th> Nom</th>
              <th> Image </th>
              <th>Quantité </th>
              <th>Total</th>
                </tr>
                </thead>
                <tbody>

                <?php
                  
                  foreach ($commandes as $item) { 
                     if($item['panier']==$items['id']){
                 ?>
                   <tr>
                  
                  <td> <?php echo $item['nom']; ?> </td>
                  <td><?php echo '<img src="images/'.$item['image'].'" width="50" height="50"> </img>'; ?>  </td>
                  <td> <?php echo $item['quantite']; ?> </td>
                  <td> <?php echo $item['total']; ?> </td>
         </tr>
         <?php }}?>
</tbody>
</table>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php }



foreach ($paniers as $items) { ?>
<div class="modal fade" id="Traiter<?php echo $items['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Traiter les commandes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times; </span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
      <input type="hidden" value="<?php echo $items['id']; ?>" name="panier_id">
      <div class="form-group">
        <select name="etat" classs="form-control">
        <option value="en livraison">En livraison </option>
        <option value="livraison termine" >livraison terminée </option>
</select>
</div>
<div class="form-group">
<button type="submit" name="sauvegarder" class="btn btn-dark"> Sauvegarder </button>
</div>
</form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<?php }
?>

        </section>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script> -->
  
  </body>
</html>