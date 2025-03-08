<?php

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="agrishop";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

  $tgl_mulai = "-";
  $tgl_selesai = "-";
?>
<?php
$jenis ="";
$kelompok ="";
$penjual ="";
$kota ="";
$strw = "";
$jmlget =0;
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
$query = "SELECT * FROM `barang`  
              join kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang 
              join jenis_barang on kelompok_barang.id_jenis=jenis_barang.id_jenis 
        $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_kota = "SELECT * FROM kota";
    $result_kota = mysqli_query($koneksi,$query_kota);
?>


<div class="container-fluid px-4">
                        <h3 class="mt-4">LAPORAN KOTA DENGAN PENJUALAN TERBANYAK</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?halaman=laporan_barang_terlaris">Dashboard</a></li>
                            <li class="breadcrumb-item active">LAPORAN PRODUK TERLARIS</li>
                        </ol>
                <br>
                                <i><b><h5> Berdasarkan : </h5></b></i>
                <form method="post">
                <input type="radio" name="rekap3" value="barang"/> Barang
                <input type="radio" name="rekap1" value="kelompok"/> Kelompok Barang
                <input type="radio" name="rekap2" value="jenis"/> Jenis Barang

                    <div class="row">
      <div class="col-md-3"> 
        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input type="date" class="form-control" name="tgl1" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>  Tanggal Selesai  </label>
          <input type="date" class="form-control" name="tgl2" required>
        </div>
      </div>
      <div class="col-md-3">
                <label>  Kota  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="kota" class="form-control">
                        <option selected disabled>-- KOTA -- </option>
                             <?php while($row = mysqli_fetch_assoc($result_kota)) { ?>
                                <option value="<?php echo $row['nm_kota']; ?>"> <?php echo $row['nm_kota']; ?></option>
                             <?php } ?>
                        </select>
                      </div></div>

                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary" value="lihat" name="l4"> Tampil </button>
                </div>
              </form></div></form>

                
<div class="table-responsive"> 
<?php 
if (isset ($_POST['l4'])and isset($_POST['rekap1']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
      <?php $dt1=$_POST['tgl1'];
      $dt2=$_POST['tgl2'];
      $kota=$_POST['kota'];
      echo "<b>Informasi : </b><i> Pencarian <b>kelompok barang</b> terlaris berdasarkan $kota </i>";?>
<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Kelompok Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT nm_kelompok_barang,sum(qty_barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.id_barang = barang.id_barang 
       LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci
       JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang
       JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on barang.id_penjual=penjual.id_penjual
    JOIN kota on penjual.kota=kota.id_kota
     where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND nm_kota= '$kota' GROUP BY kota.ID_Kota order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['nm_kelompok_barang']; ?> </td>
        <td><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table><?php }; ?>




  <?php 
if (isset ($_POST['l4'])and isset($_POST['rekap2']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
   <?php $dt1=$_POST['tgl1'];
         $dt2=$_POST['tgl2'];
         $kota=$_POST['kota'];
         echo "<b>Informasi : <i></b> Pencarian <b>jenis barang</b> terlaris berdasarkan $kota </i>";?>
<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Jenis Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT nm_jns_brg, sum(qty_barang) AS Jumlah FROM transaksi
       LEFT JOIN barang ON transaksi.id_barang = barang.id_barang 
       LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci
       JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang
       JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on barang.id_penjual=penjual.id_penjual
    JOIN kota on penjual.kota=kota.id_kota
    where nm_kota= '$kota' AND tgl_rinci BETWEEN '$dt1' AND '$dt2' GROUP BY kota.id_kota order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['nm_jns_brg']; ?> </td>
        <td><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table><?php }; ?>



  <?php 
if (isset ($_POST['l4'])and isset($_POST['rekap3'])and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
  <?php $dt1=$_POST['tgl1'];
         $dt2=$_POST['tgl2'];
         $kota=$_POST['kota'];
         echo "<b>Informasi : </b><i>Pencarian <b>barang</b> terlaris berdasarkan $kota </i>";?>
<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_barang,  sum(qty_barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.id_barang = barang.id_barang
    LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci
    JOIN penjual on barang.id_penjual=penjual.id_penjual
    JOIN kota on penjual.kota=kota.id_kota where kota.nm_kota= '$kota' AND tgl_rinci BETWEEN '$dt1' AND '$dt2' GROUP BY kota.id_kota order by Jumlah desc limit 10");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['nm_barang']; ?> </td>
        <td><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table><?php }; ?>

<?php 
if (isset ($_POST['l4']) and !isset($_POST['rekap3'])and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
    <?php echo "Tolong Masukkan inputan";
  }
?>

<button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index.php?halaman=rekapterlaris'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembali
          </button>