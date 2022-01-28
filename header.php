<?php include 'koneksi.php';
session_start();?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Rizky E-Ternak</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/pitek1.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="freshshop/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="freshshop/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="freshshop/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="freshshop/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="freshshop/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="our-link">
                        <ul>
                            <li><a href="myaccount.php"><i class="fa fa-user s_color"></i> My Profile</a></li>
                            <!-- <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li> -->
                        </ul>
                    </div>
                </div>
                <?php 
                if (!isset($_SESSION['username'])){
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mylogin">Login</button>
					</div>
                    </div>
                <?php
                }else{
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="login-box">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mylogout">Logout</button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/ayam4.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Tentang Kami</a></li>
                        <li class="dropdown">
                            <a href="shop.php" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Belanja</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.php">Ayam</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Hubungi Kami</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <?php
                        if (isset($_SESSION['username'])){
                        echo "<li class='side-menu'>";
							echo "<a href='#'>";
								echo "<i class='fa fa-shopping-bag'></i>";
                                        $id_user = $_SESSION['id_user'];
                                        $count = "SELECT count(id_ayam) AS total from t_cart WHERE t_cart.id_user='$id_user' ";
                                        $query1 = mysqli_query($dbc,$count);
                                        $result = mysqli_fetch_array($query1);
                                        echo "<span class='badge'>".$result['total']."</span>";
                                    echo "<p>My Cart</p>";
                            echo "</a>";
                        echo "</li>";
                                    } 
                                        ?>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                    <?php
                    if (isset($_SESSION['username'])){
                    $sql = "SELECT * FROM t_cart,t_ayam WHERE t_cart.id_ayam=t_ayam.id_ayam AND t_cart.id_user='$id_user'";
                    $query2 = mysqli_query($dbc,$sql);
                    $total = 0;
                    while($cart = mysqli_fetch_array($query2))
                    {
                        echo "<li>";
                        echo "<a href='#' class='photo'><img src='img/$cart[gambar]' class='cart-thumb' alt='' /></a>";
                        echo "<h6><a href='#'>".$cart['jenis_ayam']."</a></h6>";
                        echo "<p>".$cart['jumlah']."x - <span class='price'>Rp.".number_format($cart['harga']*$cart['jumlah'])."</span></p>";
                        echo "</li>";
                        $total = $total + ($cart['harga']*$cart['jumlah']);
                    }
                    echo "<li class='total'>";
                        echo "<a href='cart.php' class='btn btn-default hvr-hover btn-cart'>KERANJANG</a>";
                        echo "<span class='float-right'><strong>Total</strong>: Rp.".number_format($total)."</span>";
                    echo "</li>";
                }
                    else{
                        
                    }
                        ?>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
<!-- MODAL LOGIN -->
<div id="mylogin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
            <a href="daftar.php">Daftar Sekarang</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL LOGOUT -->
<div class="modal fade" id="mylogout" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin mau logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>