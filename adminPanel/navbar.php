<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "look_online_store");

if ($_SESSION['username'] == null) {
  echo "<script>window.location.href='login.php'</script>";
}

?>
<!DOCTYPE HTML>
<html>

<head>
  <title>LOOK ONLINE SHOP/ ADMIN DASHBOARD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />

  <!-- font-awesome icons CSS -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- //font-awesome icons CSS-->

  <!-- side nav css file -->
  <link href="css/SidebarNav.min.css" media='all' rel='stylesheet' type='text/css' />
  <!-- //side nav css file -->

  <!-- js-->
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/modernizr.custom.js"></script>

  <!--webfonts-->
  <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <!--//webfonts-->

  <!-- chart -->
  <script src="js/Chart.js"></script>
  <!-- //chart -->

  <!-- Metis Menu -->
  <script src="js/metisMenu.min.js"></script>
  <script src="js/custom.js"></script>
  <link href="css/custom.css" rel="stylesheet">
  <!--//Metis Menu -->
  <style>
    #chartdiv {
      width: 100%;
      height: 295px;
    }
  </style>
  <!--pie-chart --><!-- index page sales reviews visitors pie chart -->

  <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

  <!-- requried-jsfiles-for owl -->
  <link href="css/owl.carousel.css" rel="stylesheet">

  <!-- //requried-jsfiles-for owl -->
</head>

<body class="cbp-spmenu-push">
  <div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <!--left-fixed -navigation-->
      <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> LOOK<span class="dashboard_text">ADMIN DASHBOARD</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.php">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <span>Category/Product</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="AddCategory.php"><i class="fa fa-angle-right"></i>Add Category</a></li>
                  <li><a href="AddSubCategory.php"><i class="fa fa-angle-right"></i> Add Sub Category</a></li>
                  <li><a href="AddProduct.php"><i class="fa fa-angle-right"></i> Add Product</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <span>Detail Category/Product</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="CategoryDetail.php"><i class="fa fa-angle-right"></i>Show Category</a></li>
                  <li><a href="SubCategoryDetail.php"><i class="fa fa-angle-right"></i> Show Sub Category</a></li>
                  <li><a href="ProductsDetail.php"><i class="fa fa-angle-right"></i> Show Product</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <span>Detail Order</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="OrderDetail.php"><i class="fa fa-angle-right"></i>Show Order Detail</a></li>

                </ul>
              </li>

            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </nav>
      </aside>
    </div>

    <!-- header-starts -->
    <div class="sticky-header header-section ">
      <div class="header-right">

        <div class="profile_details">
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img">
                  <span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
                  <div class="user-name">
                    <?php if ($_SESSION['username'] != null) { ?>
                      <p><?php echo $_SESSION['username']; ?></p>
                    <?php } ?>
                    <span>Administrator</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>
                </div>
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li>
                  <form method="post"> <button type="submit" name="btn_logout" class="btn btn-danger btn-lg">Logout</button> </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
    </div>
    <!-- //header-ends -->

    <?php

    if (isset($_POST['btn_logout'])) {
      session_destroy();
      echo "<script>window.location.href='login.php'</script>";
    }

    ?>