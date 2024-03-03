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
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
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
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

      <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>Nos Clients</h5>
                  </div>
                  <canvas id="serverstatus01" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 70,
                        color: "#FF6B6B"
                      },
                      {
                        value: 30,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h2><?php
                        include 'connexion.php';
                        $req = $cnx->prepare("SELECT id from inscri ORDER BY id");
                        $req->execute(array()); 
                        $les_clients = $req->fetchAll();
                        $row=
                         $row = count($les_clients);
                         echo '<h4> Total clients: '.$row.'</h4>';
                     ?></h2>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>

              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Réservation</h5>
                  </div>
                  <canvas id="serverstatus02" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#1c9ca7"
                      },
                      {
                        value: 40,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <footer>
                    <div class="pull-right">
                      <h5><?php
                        include 'connexion.php';
                        $req = $cnx->prepare("SELECT id from reservation ORDER BY id");
                        $req->execute(array()); 
                        $les_clients = $req->fetchAll();
                        $row=
                         $row = count($les_clients);
                         echo '<h4> Total reservation: '.$row.'</h4>';
                     ?></h5>
                    </div>
                </div>
                </div>
                    <div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>Nos Experts</h5>
                  </div>
                  <canvas id="serverstatus03" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#2b2b2b"
                      },
                      {
                        value: 40,
                        color: "#fffffd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <footer>
                  <h3><?php
                        include 'connexion.php';
                        $req = $cnx->prepare("SELECT id from expert ORDER BY id");
                        $req->execute(array()); 
                        $les_clients = $req->fetchAll();
                        $row=
                         $row = count($les_clients);
                         echo '<h4> Total : '.$row.'</h4>';
                     ?></h3>
                </div>
              </div>
                  </footer>
                </div>

               
               
                <!-- /grey-panel -->
              </div>
          
       
         
                
         
             
            


  
</body>

</html>
