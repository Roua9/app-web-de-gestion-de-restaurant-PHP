<?php
include 'connexion.php';

$req = $cnx->prepare("SELECT * from ajout_pizza");
$req->execute(array()); 

$les_clients = $req->fetchAll(); 

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <span>paniers</span>
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
                <h4><i class="fa fa-angle-right"></i> Nos pizzas</h4>
                <hr>
                <thead>
                <div class="form-group row" >
                     <label class="col-sm-2 col-form-label"></label>
                     <div class="col-sm-10">
                         <input type="button" onclick="window.location.href ='ajout-produits.php';" name="ajout" class="btn btn-lg btn-primary" value="ajouter pizza" style="margin-left: -200px" >
                    </div>
                </div>
                  <tr>
                    <th><i class="fa fa-address-card"></i> Nom Pizza</th>
                    <th class="hidden-phone"><i class="fa fa-file-text"></i> Description</th>
                    <th><i class="fa fa-money"></i> Prix </th>
                    <th><i class="fa fa-truck"></i>Livraison</th>
                    <th><i class="fa fa-file-photo-o"></i>Image</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                    
                <?php
    
                foreach ($les_clients as $item) { 
                ?>
                  <tr>
                 <td> <?php echo $item['nom']; ?> </td>
                 <td> <?php echo $item['description']; ?> </td>
                 <td> <?php echo $item['prix']; ?> </td>
                 <td> <?php echo $item['livraison']; ?> </td>
                 <td> <?php echo '<img src="images/'.$item['image'].'" width="50" height="50"> </img>'; ?> </td>
                
                 <td> <a href="update.php?id=<?php echo $item['id']; ?>" class="m-2">
                 <i class="fa fa-edit fa-2x"></i>
                </a>
                <a onclick="return confirm('Etes-vous sur de vouloir supprimer cette ligne ?')"
                 href="delete.php?id=<?php echo $item['id']; ?>" class="m-2">
            <i class="fa fa-trash fa-2x red-icon"> </i></a>
            
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
        </section>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>