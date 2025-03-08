<?php
session_start ();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="agrishop";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>AGRISHOP</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons  pe-icon-7   -->
    <link href="assets1/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body >
    <div class="wrapper">
        <div  class="sidebar" data-color="green">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="index.php" class= "simple-text">
                        Agrishop
                    </a>
                </div>
                <div class="logo">
                    <a href="index.php" class= "simple-text">
                        <?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
                        <?php $pecah=$ambil->fetch_assoc() ?>
                        Hai Admin <?php echo $pecah['username_admin'];?>
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="./index.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=pembeli">
                            <i class="pe-7s-user"></i>
                            <p>Pembeli</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=jenis_pembeli">
                            <i class="nc-icon nc-badge"></i>
                            <p>Jenis Pembeli</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=status_transfer_penjual">
                            <i class="nc-icon nc-badge"></i>
                            <p>Status Transfer Penjual</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=penjual">
                            <i class="pe-7s-user"></i>
                            <p>Penjual</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=faktur_beli">
                            <i class="nc-icon nc-notes"></i>
                            <p>Faktur Beli</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=faktur_rinci">
                            <i class="nc-icon nc-notes"></i>
                            <p>Faktur Rinci</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=status_pembayaran">
                            <i class="pe-7s-cash"></i>
                            <p>Status Pembayaran</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=jasa_pembayaran">
                            <i class="pe-7s-news-paper"></i>
                            <p> Jasa Pembayaran </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=jenis_pembayaran">
                            <i class="pe-7s-wallet"></i>
                            <p> Jenis Pembayaran </p>
                        </a>
                    </li>
                   <li>
                        <a class="nav-link" href="index.php?halaman=daftar_pengiriman">
                            <i class="nc-icon nc-notes"></i>
                            <p>Daftar Pengiriman</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=kategori">
                            <i class="pe-7s-menu"></i>
                            <p> Kategori </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=kota_tujuan">
                            <i class="pe-7s-map-2"></i>
                            <p>Kota</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=jasa_kirim">
                            <i class="pe-7s-plane"></i>
                            <p>Jasa Kirim</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=sistem_pengiriman">
                            <i class="nc-icon nc-delivery-fast"></i>
                            <p>Sistem Pengiriman</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=bank">
                            <i class="nc-icon nc-bank"></i>
                            <p> Bank </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=barang">
                            <i class="nc-icon nc-cart-simple"></i>
                            <p> Barang </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=kelompok_barang">
                            <i class="nc-icon nc-cart-simple"></i>
                            <p> Kelompok Barang </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=jenis_barang">
                            <i class="pe-7s-cart"></i>
                            <p>Jenis Barang</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=diskon">
                            <i class="nc-icon nc-tag-content"></i>
                            <p> Diskon </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=status_pengiriman">
                            <i class="pe-7s-ribbon"></i>
                            <p>Status Pengiriman</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index.php?halaman=transaksi">
                            <i class="pe-7s-ribbon"></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"> User </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./login.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <?php
            if (isset($_GET['halaman']))
            {
                if($_GET['halaman']=="penjual")
                {
                    include'penjual.php';
                }
                else if ($_GET['halaman']=="penjual_ubah")
                {
                    include 'penjual_ubah.php';
                }
                else if ($_GET['halaman']=="penjual_hapus")
                {
                    include 'penjual_hapus.php';
                }
                else if ($_GET['halaman']=="penjual_tambah")
                {
                    include 'penjual_tambah.php';
                }
                else if ($_GET['halaman']=="penjual_cari")
                {
                    include 'penjual_cari.php';
                }
                else if ($_GET['halaman']=="pembeli")
                {
                    include 'pembeli.php';
                }
                else if ($_GET['halaman']=="pembeli_ubah")
                {
                    include 'pembeli_ubah.php';
                }
                else if ($_GET['halaman']=="pembeli_hapus")
                {
                    include 'pembeli_hapus.php';
                }
                else if ($_GET['halaman']=="pembeli_tambah")
                {
                    include 'pembeli_tambah.php';
                }
                else if ($_GET['halaman']=="pembeli_cari")
                {
                    include 'pembeli_cari.php';
                }
                else if ($_GET['halaman']=="barang")
                {
                    include 'barang.php';
                }
                else if ($_GET['halaman']=="barang_ubah")
                {
                    include 'barang_ubah.php';
                }
                else if ($_GET['halaman']=="barang_hapus")
                {
                    include 'barang_hapus.php';
                }
                else if ($_GET['halaman']=="barang_tambah")
                {
                    include 'barang_tambah.php';
                }
                else if ($_GET['halaman']=="barang_cari")
                {
                    include 'barang_cari.php';
                }
                else if ($_GET['halaman']=="kelompok_barang")
                {
                    include 'kelompok_barang.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_ubah")
                {
                    include 'kelompok_barang_ubah.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_hapus")
                {
                    include 'kelompok_barang_hapus.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_tambah")
                {
                    include 'kelompok_barang_tambah.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_cari")
                {
                    include 'kelompok_barang_cari.php';
                }
                else if ($_GET['halaman']=="bank")
                {
                    include 'bank.php';
                }
                else if ($_GET['halaman']=="bank_ubah")
                {
                    include 'bank_ubah.php';
                }
                else if ($_GET['halaman']=="bank_hapus")
                {
                    include 'bank_hapus.php';
                }
                else if ($_GET['halaman']=="bank_tambah")
                {
                    include 'bank_tambah.php';
                }
                else if ($_GET['halaman']=="bank_cari")
                {
                    include 'bank_cari.php';
                }
                else if ($_GET['halaman']=="kota_tujuan")
                {
                    include 'kota_tujuan.php';
                }
                else if ($_GET['halaman']=="kota_tujuan_ubah")
                {
                    include 'kota_tujuan_ubah.php';
                }
                else if ($_GET['halaman']=="kota_tujuan_hapus")
                {
                    include 'kota_tujuan_hapus.php';
                }
                else if ($_GET['halaman']=="kota_tujuan_tambah")
                {
                    include 'kota_tujuan_tambah.php';
                }
                else if ($_GET['halaman']=="kota_tujuan_cari")
                {
                    include 'kota_tujuan_cari.php';
                }
                else if ($_GET['halaman']=="kategori")
                {
                    include 'kategori.php';
                }
                else if ($_GET['halaman']=="kategori_ubah")
                {
                    include 'kategori_ubah.php';
                }
                else if ($_GET['halaman']=="kategori_hapus")
                {
                    include 'kategori_hapus.php';
                }
                else if ($_GET['halaman']=="kategori_tambah")
                {
                    include 'kategori_tambah.php';
                }
                else if ($_GET['halaman']=="kategori_cari")
                {
                    include 'kategori_cari.php';
                }
                else if ($_GET['halaman']=="jenis_barang")
                {
                    include 'jenis_barang.php';
                }
                else if ($_GET['halaman']=="jenis_barang_ubah")
                {
                    include 'jenis_barang_ubah.php';
                }
                else if ($_GET['halaman']=="jenis_barang_hapus")
                {
                    include 'jenis_barang_hapus.php';
                }
                else if ($_GET['halaman']=="jenis_barang_tambah")
                {
                    include 'jenis_barang_tambah.php';
                }
                else if ($_GET['halaman']=="jenis_barang_cari")
                {
                    include 'jenis_barang_cari.php';
                }
                else if ($_GET['halaman']=="jasa_kirim")
                {
                    include 'jasa_kirim.php';
                }
                else if ($_GET['halaman']=="jasa_kirim_ubah")
                {
                    include 'jasa_kirim_ubah.php';
                }
                else if ($_GET['halaman']=="jasa_kirim_hapus")
                {
                    include 'jasa_kirim_hapus.php';
                }
                else if ($_GET['halaman']=="jasa_kirim_tambah")
                {
                    include 'jasa_kirim_tambah.php';
                }
                else if ($_GET['halaman']=="jasa_kirim_cari")
                {
                    include 'jasa_kirim_cari.php';
                }
                else if ($_GET['halaman']=="diskon")
                {
                    include 'diskon.php';
                }
                else if ($_GET['halaman']=="diskon_ubah")
                {
                    include 'diskon_ubah.php';
                }
                else if ($_GET['halaman']=="diskon_hapus")
                {
                    include 'diskon_hapus.php';
                }
                else if ($_GET['halaman']=="diskon_tambah")
                {
                    include 'diskon_tambah.php';
                }
                else if ($_GET['halaman']=="diskon_cari")
                {
                    include 'diskon_cari.php';
                }
                else if ($_GET['halaman']=="faktur_rinci")
                {
                    include 'faktur_rinci.php';
                }
                else if ($_GET['halaman']=="faktur_rinci_ubah")
                {
                    include 'faktur_rinci_ubah.php';
                }
                else if ($_GET['halaman']=="faktur_rinci_hapus")
                {
                    include 'faktur_rinci_hapus.php';
                }
                else if ($_GET['halaman']=="faktur_rinci_tambah")
                {
                    include 'faktur_rinci_tambah.php';
                }
                else if ($_GET['halaman']=="faktur_rinci_cari")
                {
                    include 'faktur_rinci_cari.php';
                }
                else if ($_GET['halaman']=="faktur_beli")
                {
                    include 'faktur_beli.php';
                }
                else if ($_GET['halaman']=="faktur_beli_ubah")
                {
                    include 'faktur_beli_ubah.php';
                }
                else if ($_GET['halaman']=="faktur_beli_hapus")
                {
                    include 'faktur_beli_hapus.php';
                }
                else if ($_GET['halaman']=="faktur_beli_tambah")
                {
                    include 'faktur_beli_tambah.php';
                }
                else if ($_GET['halaman']=="faktur_beli_cari")
                {
                    include 'faktur_beli_cari.php';
                }
                else if ($_GET['halaman']=="faktur_beli_detail")
                {
                    include 'faktur_beli_co1.php';
                }
                else if ($_GET['halaman']=="lihat_pembayaran")
                {
                    include 'lihat_pembayaran.php';
                }
                else if ($_GET['halaman']=="sistem_pengiriman")
                {
                    include 'sistem_pengiriman.php';
                }
                else if ($_GET['halaman']=="sistem_pengiriman_ubah")
                {
                    include 'sistem_pengiriman_ubah.php';
                }
                else if ($_GET['halaman']=="sistem_pengiriman_hapus")
                {
                    include 'sistem_pengiriman_hapus.php';
                }
                else if ($_GET['halaman']=="sistem_pengiriman_tambah")
                {
                    include 'sistem_pengiriman_tambah.php';
                }
                else if ($_GET['halaman']=="sistem_pengiriman_cari")
                {
                    include 'sistem_pengiriman_cari.php';
                }
                else if ($_GET['halaman']=="jenis_pembeli")
                {
                    include 'jenis_pembeli.php';
                }
                else if ($_GET['halaman']=="jenis_pembeli_ubah")
                {
                    include 'jenis_pembeli_ubah.php';
                }
                else if ($_GET['halaman']=="jenis_pembeli_hapus")
                {
                    include 'jenis_pembeli_hapus.php';
                }
                else if ($_GET['halaman']=="jenis_pembeli_tambah")
                {
                    include 'jenis_pembeli_tambah.php';
                }
                else if ($_GET['halaman']=="jenis_pembeli_cari")
                {
                    include 'jenis_pembeli_cari.php';
                }
                else if ($_GET['halaman']=="jenis_pembayaran")
                {
                    include 'jenis_pembayaran.php';
                }
                else if ($_GET['halaman']=="jenis_pembayaran_ubah")
                {
                    include 'jenis_pembayaran_ubah.php';
                }
                else if ($_GET['halaman']=="jenis_pembayaran_hapus")
                {
                    include 'jenis_pembayaran_hapus.php';
                }
                else if ($_GET['halaman']=="jenis_pembayaran_tambah")
                {
                    include 'jenis_pembayaran_tambah.php';
                }
                else if ($_GET['halaman']=="jenis_pembayaran_cari")
                {
                    include 'jenis_pembayaran_cari.php';
                }
                else if ($_GET['halaman']=="status_pengiriman")
                {
                    include 'status_pengiriman.php';
                }
                else if ($_GET['halaman']=="status_pengiriman_ubah")
                {
                    include 'status_pengiriman_ubah.php';
                }
                else if ($_GET['halaman']=="status_pengiriman_hapus")
                {
                    include 'status_pengiriman_hapus.php';
                }
                else if ($_GET['halaman']=="status_pengiriman_tambah")
                {
                    include 'status_pengiriman_tambah.php';
                }
                else if ($_GET['halaman']=="status_pengiriman_cari")
                {
                    include 'status_pengiriman_cari.php';
                }
                else if ($_GET['halaman']=="status_pembayaran")
                {
                    include 'status_pembayaran.php';
                }
                else if ($_GET['halaman']=="status_pembayaran_ubah")
                {
                    include 'status_pembayaran_ubah.php';
                }
                else if ($_GET['halaman']=="status_pembayaran_hapus")
                {
                    include 'status_pembayaran_hapus.php';
                }
                else if ($_GET['halaman']=="status_pembayaran_tambah")
                {
                    include 'status_pembayaran_tambah.php';
                }
                else if ($_GET['halaman']=="status_pembayaran_cari")
                {
                    include 'status_pembayaran_cari.php';
                }
                else if ($_GET['halaman']=="status_transfer_penjual")
                {
                    include 'status_transfer_penjual.php';
                }
                else if ($_GET['halaman']=="status_transfer_penjual_ubah")
                {
                    include 'status_transfer_penjual_ubah.php';
                }
                else if ($_GET['halaman']=="status_transfer_penjual_hapus")
                {
                    include 'status_transfer_penjual_hapus.php';
                }
                else if ($_GET['halaman']=="status_transfer_penjual_tambah")
                {
                    include 'status_transfer_penjual_tambah.php';
                }
                else if ($_GET['halaman']=="status_transfer_penjual_cari")
                {
                    include 'status_transfer_penjual_cari.php';
                }
                else if ($_GET['halaman']=="jasa_pembayaran")
                {
                    include 'jasa_pembayaran.php';
                }
                else if ($_GET['halaman']=="jasa_pembayaran_ubah")
                {
                    include 'jasa_pembayaran_ubah.php';
                }
                else if ($_GET['halaman']=="jasa_pembayaran_hapus")
                {
                    include 'jasa_pembayaran_hapus.php';
                }
                else if ($_GET['halaman']=="jasa_pembayaran_tambah")
                {
                    include 'jasa_pembayaran_tambah.php';
                }
                else if ($_GET['halaman']=="jasa_pembayaran_cari")
                {
                    include 'jasa_pembayaran_cari.php';
                }
                else if ($_GET['halaman']=="daftar_pengiriman")
                {
                    include 'daftar_pengiriman.php';
                }
                else if ($_GET['halaman']=="daftar_pengiriman_ubah")
                {
                    include 'daftar_pengiriman_ubah.php';
                }
                else if ($_GET['halaman']=="daftar_pengiriman_hapus")
                {
                    include 'daftar_pengiriman_hapus.php';
                }
                else if ($_GET['halaman']=="daftar_pengiriman_tambah")
                {
                    include 'daftar_pengiriman_tambah.php';
                }
                else if ($_GET['halaman']=="daftar_pengiriman_cari")
                {
                    include 'daftar_pengiriman_cari.php';
                }
                else if ($_GET['halaman']=="transaksi")
                {
                    include 'transaksi.php';
                }
                else if ($_GET['halaman']=="transaksi_tambah")
                {
                    include 'transaksi_tambah.php';
                }
                else if ($_GET['halaman']=="transaksi_hapus")
                {
                    include 'transaksi_hapus.php';
                }
                else if ($_GET['halaman']=="laporanadmin")
                {
                    include 'laporanadmin.php';
                }
                else if ($_GET['halaman']=="laporan_data_penjual")
                {
                    include 'laporan_data_penjual.php';
                }
                else if ($_GET['halaman']=="laporan_data_penjual_tanggal")
                {
                    include 'laporan_data_penjual_tanggal.php';
                }
                else if ($_GET['halaman']=="laporan_data_penjual_jumlah")
                {
                    include 'laporan_data_penjual_jumlah.php';
                }
                else if ($_GET['halaman']=="laporan_data_penjual_kategori")
                {
                    include 'laporan_data_penjual_kategori.php';
                }
                else if ($_GET['halaman']=="laporan_penjualan_barang")
                {
                    include 'laporan_penjualan_barang.php';
                }
                else if ($_GET['halaman']=="laporan_penjualan_kelompok")
                {
                    include 'laporan_penjualan_kelompok.php';
                }
                else if ($_GET['halaman']=="laporan_penjualan_jenis")
                {
                    include 'laporan_penjualan_jenis.php';
                }
                else if ($_GET['halaman']=="laporan_barang_terlaris_kota")
                {
                    include 'laporan_barang_terlaris_kota.php';
                }
                else if ($_GET['halaman']=="laporan_barang_terlaris_penjual")
                {
                    include 'laporan_barang_terlaris_penjual.php';
                }
                else if ($_GET['halaman']=="laporan_barang_terlaris")
                {
                    include 'laporan_barang_terlaris.php';
                }
                else if ($_GET['halaman']=="laporan_barang_terlaris_kelompok")
                {
                    include 'laporan_barang_terlaris_kelompok.php';
                }
                else if ($_GET['halaman']=="laporan_barang_terlaris_jenis")
                {
                    include 'laporan_barang_terlaris_jenis.php';
                }
                else if ($_GET['halaman']=="kelompok_barang")
                {
                    include 'kelompok_barang.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_cari")
                {
                    include 'kelompok_barang_cari.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_hapus")
                {
                    include 'kelompok_barang_hapus.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_ubah")
                {
                    include 'kelompok_barang_ubah.php';
                }
                else if ($_GET['halaman']=="kelompok_barang_tambah")
                {
                    include 'kelompok_barang_tambah.php';
                }
                else if ($_GET['halaman']=="laporan_stok")
                {
                    include 'laporan_stok.php';
                }
                else if ($_GET['halaman']=="laporan_stok_cari")
                {
                    include 'laporan_stok_cari.php';
                }
                else if ($_GET['halaman']=="cari_laporanstok")
                {
                    include 'cari_laporanstok.php';
                }
                else if ($_GET['halaman']=="laporan_penjualan")
                {
                    include 'laporan_penjualan.php';
                }
                else if ($_GET['halaman']=="cari_laporan_penjualan")
                {
                    include 'cari_laporan_penjualan.php';
                }
            }
            else
            {
                include 'home.php'; 
            }
           ?>
                </div>
            </div>                   
    </div>
</div>
</body>
</html>