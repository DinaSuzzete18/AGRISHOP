<?php
include 'koneksi.php';
$jenis ="";
$kelompok ="";
$penjual ="";
$kota ="";
$status ="";
$strw = "";
$jmlget =0;


if (isset($_POST['tgl_mulai']))
{
    $tgl_mulai=$_POST['tgl_mulai'];
} 
if (isset($_POST['tgl_selesai']))
{
    $tgl_selesai=$_POST['tgl_selesai'];
} 
 if(isset($_GET['kelompok'])){
      $kelompok = $_GET['kelompok'];
      $strc[] = "barang.id_kelompok_barang= '$kelompok'";
      $jmlget++;
    }
     if(isset($_GET['jenis'])){
      $jenis = $_GET['jenis'];
      $strc[] = "kelompok_barang.id_jenis_barang= '$jenis'";
      $jmlget++;
    }
    if(isset($_GET['penjual'])){
      $penjual = $_GET['penjual'];
      $strc[] = "barang.id_penjual= '$penjual'";
      $jmlget++;
    }
    if(isset($_GET['kota'])){
      $kota = $_GET['kota'];
      $strc[] = "penjual.kota= '$kota'";
      $jmlget++;
    }
    
  
  $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }
$query = "SELECT * FROM barang  
              join kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang 
              join jenis_barang on kelompok_barang.id_jenis=jenis_barang.id_jenis 
        $strw";

$query1= "SELECT nm_kelompok_barang, sum(qty_barang) AS QTY FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota GROUP BY kelompok_barang.id_kelompok_barang order by QTY desc limit 10 ";

    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);
  
    $result1=mysqli_query($koneksi,$query1);
    $resnum = mysqli_num_rows($result1);
    
    $query_penjual = "SELECT * FROM penjual";
    $result_penjual = mysqli_query($koneksi,$query_penjual);    

    $query_kelompok = "SELECT * FROM kelompok_barang";
    $result_kelompok = mysqli_query($koneksi,$query_kelompok); 

    $query_kota = "SELECT * FROM kota";
    $result_kota = mysqli_query($koneksi,$query_kota);
?>


      <!-- Content -->
      <div class="container-fluid px-4">
    <h1 class="mt-4">LAPORAN PENJUALAN</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">LAPORAN PENJUALAN</li>
    </ol>

    <form  method="POST">
       <input type="radio" name="rekap1" value="kelompok"/> Kelompok Barang
        <input type="radio" name="rekap2" value="jenis"/> Jenis Barang
        <input type="radio" name="rekap" value="kelompok"/> Barang
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div>
  </form>
  <div class="card-body">
    <div class="table-wrap">
        <table class="table">
                <?php
                  if (isset ($_POST['submit']) and isset($_POST['rekap1']))
                 {   echo "<script>location='index.php?halaman=laporan_penjualan_jenis';</script>";
                 }
                 elseif (isset ($_POST['submit']) and isset($_POST['rekap2'])) {
                    echo "<script>location='index.php?halaman=laporan_penjualan_kelompok';</script>";
                  }
                  elseif (isset ($_POST['submit']) and isset($_POST['rekap'])) {
                    echo "<script>location='index.php?halaman=laporan_penjualan_barang';</script>";
                  } ?>