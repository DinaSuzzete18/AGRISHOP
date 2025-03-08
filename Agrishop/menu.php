<?php
session_start();
$koneksi=new mysqli("localhost", "root", "", "agrishop");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>AGRISHOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">

    <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/templatemo.css">
    <link rel="stylesheet" href="assets1/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets1/css/fontawesome.min.css">

        <!--     Fonts and icons  pe-icon-7   -->
    <link href="penjual/assets1/css/pe-icon-7-stroke.css" rel="stylesheet" />
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Agrishop
            </a>
            :Kesegaran Terbaik
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span class="pe-7s-more"> Home </span> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php"> 
                                <span class="pe-7s-menu"> Produk </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="riwatyat.php">
                               <span class="pe-7s-news-paper"> Riwayat </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="keranjang.php">
                                <span class="pe-7s-cart">Keranjang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <span class="pe-7s-user">Log out</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <form class="form-horizontal" role="search" method="post" action="pencarian.php">
            <div class="col-md-8">
                <table border="0">
                <tr>
                <td><div class="form-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                <td><button class="btn btn-primary" name="cari"> Cari </button>
                </div>
                </tr>
                </table>
            </div>
        </form>
        
    </nav>
    <!--KONTEN---->
	<nav>
        <section class="content">
            <div class="container">
            <h3 class="h1 text-success"><b>Produk Agrishop</b></h3>
            <div class="row">
            <?php $ambil=$koneksi->query("SELECT * FROM barang"); ?>
            <?php while ($pecah=$ambil->fetch_assoc()){ ?>
                
                <div class="col-md-4">
                    <div class="thumbnail">
                    <img src="penjual/photo/<?php echo $pecah['foto_barang']; ?>" alt="" width="150">
                    <div class="caption">
                        <h3><?php echo $pecah['nm_barang']; ?></h3>
                        <h6>Deskripsi:<?php echo $pecah['deskripsi']; ?></h6>
                        <h6>Berat    : <?php echo number_format( $pecah['berat'])?> Kg </h6>
                        <h4>Rp.<?php echo number_format($pecah['harga']); ?></h4>
                        <a href="checkout.php" class="btn btn-primary"> Belanja </a>
                    </div>
                    </div>
                </div>
            <?php } ?>
            </div>

            </div>
        </section>

        </div>
	</nav>
</body>
</html>