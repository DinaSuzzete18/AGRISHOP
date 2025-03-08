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
                        <h3 class="mt-4">LAPORAN BARANG TERLARIS</h3>
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
                  <button type="submit" class="btn btn-primary" value="lihat" name="l4"> Tampil </button>
                </div>
              </form></div></form>

                
<div class="table-responsive"> 
<?php 
if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap1']) and isset($_POST['kota'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    $kota=$_POST['kota'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Kelompok Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_kelompok_barang, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND nm_kota='$kota'  GROUP BY kelompok_barang.id_kelompok_barang order by jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
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
  </table>
<?php }
else if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap1'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Kelompok Barang</th>
      <th>Nama Kota</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_kelompok_barang, nm_kota, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND faktur_beli.id_status_pembayaran='STAPEM003' GROUP BY kelompok_barang.id_kelompok_barang order by jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['nm_kelompok_barang']; ?> </td>
        <td><?php echo $row['nm_kota']; ?>
        <td><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="3"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table>
<?php }
else if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap2']) and isset($_POST['kota'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    $kota=$_POST['kota'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Jenis Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_jns_brg, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND nm_kota='$kota' GROUP BY jenis_barang.id_jenis order by jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
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
  </table>
<?php } 
else if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap2'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Jenis Barang</th>
      <th> Nama Kota </th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_jns_brg, nm_kota, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND faktur_beli.id_status_pembayaran='STAPEM003' GROUP BY jenis_barang.id_jenis order by jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['nm_jns_brg']; ?> </td>
        <td><?php echo $row['nm_kota']; ?> </td>
        <td><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="3"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table>
<?php }
 else if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap3'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Nama Kota</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_barang, nm_kota, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND faktur_beli.id_status_pembayaran='STAPEM003'  GROUP BY barang.nm_barang order by jumlah desc limit 10 ");?>
      <?php  $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['nm_barang']; ?> </td>
        <td><?php echo $row['nm_kota']; ?> </td>
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
  </table>
<?php } 
else if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['kota'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    $kota=$_POST['kota'];
    ?>

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
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_barang, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND nm_kota='$kota' GROUP BY barang.id_barang order by jumlah desc limit 10 ");?>
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
  </table>
<?php } 
else if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

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
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_barang, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2'  GROUP BY barang.id_penjual order by jumlah desc limit 10 ");?>
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
  </table>
<?php } 
else if (isset ($_POST['l4']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

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
      <?php $ambil1= mysqli_query ($koneksi,"SELECT nm_barang, sum(qty_barang) AS Jumlah FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2'  GROUP BY barang.id_penjual order by jumlah desc limit 10 ");?>
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
  </table>
<?php } ?>
<button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index.php?halaman=rekapterlaris'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembali
          </button>