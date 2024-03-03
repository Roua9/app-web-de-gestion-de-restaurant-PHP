<?php
include 'connexion.php';

$id=$_GET['id'];
$rq = $cnx->prepare("SELECT * from ajout_pizza where id=$id");
$rq->execute(array()); 
$pizza = $rq->fetchAll(); 
if(isset($_POST['ajout']))
{
  
$nom = $_POST['nom'];
$desc = $_POST['desc'];
$prix = $_POST['prix'];
$livraison = $_POST['livraison'];
$img = $_POST['img'];
try
{
$req = $cnx -> prepare('UPDATE ajout_pizza SET nom = :nom, description = :desc, prix = :prix, livraison = :livraison, image = :img WHERE id = :id');
$req->execute(array('nom'=>$nom,'desc'=>$desc ,'prix'=>$prix,'livraison'=>$livraison,
'img'=>$img, 'id'=>$id)); 
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if($req){
    header("location: pizza.php");
}else{
    $erreur="la mise à jour a échouée";
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
  <title>Mia'Pizza</title>

  <!-- Favicons -->
  <link href="img/img-form.jpg" rel="icon">
  <link href="img/img-form.jpg" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
            <a class="active" href="index.html">
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
            <a class="active" href="commandes/liste.php">
              <i class="fa fa-users"></i>
              <span>Commandes</span>
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
          <li class="mt">
            <a class="active" href="reservation_aff.php">
              <i class="fa fa-users"></i>
              <span>Avis clients</span>
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
                <?php if(isset($erreur)){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $erreur; ?>
                </div>

               <?php }?>
             <form method="post" action="">
             <?php
    foreach ($pizza as $item) { 
    ?>
                 <div class="form-group row">
                     <label class="col-sm-2 col-form-label "><b> Nom Pizza </b></label>
                     <div class="col-sm-9">
                         <input type="text" name="nom" class="form-control" value="<?php echo $item['nom'] ?>">
                    </div>
                </div> 

                <div class="form-group row">
                     <label class="col-sm-2 col-form-label"><b> Description </b></label>
                     <div class="col-sm-9">
                         <input type="text" name="desc" class="form-control" value="<?php echo $item['description'] ?>">
                    </div>
                </div> 

                <div class="form-group row">
                     <label class="col-sm-2 col-form-label"><b> Prix </b></label>
                     <div class="col-sm-9">
                         <input type="number" name="prix" value="<?php echo $item['prix'] ?>" step="any" >
                    </div>
                </div> 

                <div class="form-group row">
                     <label class="col-sm-2 col-form-label"><b> livraison </b></label>
                     <div class="col-sm-9">
                         <input type="number" name="livraison" value="<?php echo $item['livraison'] ?>" step="any"  >
                    </div>
                </div> 
               <div class="form-group row">
                     <label class="col-sm-2 col-form-label"><b> Image </b></label>
                     <div class="col-sm-10">
                         <input type="file" name="img" value="<?php echo $item['image'] ?>" class="form-control-file"  >
                    </div>
                </div> 
             
                <div class="form-group row">
                     <label class="col-sm-2 col-form-label"></label>
                     <div class="col-sm-10">
                         <input type="submit" name="ajout" class="btn btn-lg btn-primary">
                    </div>
                </div> 
                <?php }?>
               
</form>
              </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        </section>
    </section>