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

    $query_kelompok = "SELECT * FROM kelompok_barang";
    $result_kelompok = mysqli_query($koneksi,$query_kelompok); 

    $query_jenis = "SELECT * FROM jenis_barang";
    $result_jenis = mysqli_query($koneksi,$query_jenis); 
    
    $query_penjual = "SELECT * FROM penjual";
    $result_penjual = mysqli_query($koneksi,$query_penjual);    

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
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input type="date" class="form-control" name="tgl1">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>  Tanggal Selesai  </label>
          <input type="date" class="form-control" name="tgl2">
        </div>
      </div>
        <div class="col-md-3">
            <label>  Kota  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                    <select name="kota" class="form-control">
                    <option selected disabled>-- KOTA-- </option>
                        <?php while($row = mysqli_fetch_assoc($result_kota)) { ?>
                        <option value="<?php echo $row['nm_kota']; ?>"> <?php echo $row['nm_kota']; ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div> 
        <div class="col-md-3">
            <label>  Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                    <select name="barang" class="form-control">
                    <option selected disabled>-- Barang-- </option>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['nm_barang']; ?>"> <?php echo $row['nm_barang']; ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div> 
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div> <br>
  </form> <br>
  <div class="card-body">
    <div class="table-wrap">
        <table class="table"> 
                <?php
                 if (isset ($_POST['submit']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['kota']) and isset($_POST['barang']) )
                 { ?>
                <?php $dt1=$_POST['tgl1'];
                  $dt2=$_POST['tgl2'];
                  $kota=$_POST['kota']; $barang=$_POST['barang'];
                  echo "<b>Informasi : </b><i> Pencarian <b>kelompok barang</b> berdasarkan $barang dari $kota dari tanggal $dt1 sampai $dt2 </i>";?>
                <?php $query1= "SELECT nm_pen, sum(qty_barang) AS QTY FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND nm_kota= '$kota' AND nm_barang= '$barang' GROUP BY penjual.id_penjual order by QTY desc limit 10 "; 
                $resultt=mysqli_query($koneksi,$query1);
                $resnum = mysqli_num_rows($result1);?>
                    <thead class="thead-primary">
                <tr>
                    <th><p style="text-align: center ; color:#000000">No</th>
                    <th><p style="text-align: center ; color:#000000">Kelompok</th>
                    <th><p style="text-align: center ; color:#000000">Jumlah Penjualan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php $nomor=1;
                     $total=0;
                    while($db1=$resultt->fetch_assoc()){ ?>
                        <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $db1['nm_pen'];?></td>
                        <td><?php echo $db1['QTY'];?></td>
                        </tr>
                        </tr>
                
                    <?php }  ?>
                 <?php } else if (isset ($_POST['submit']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset ($_POST['barang']))
                 { ?>
                <?php $dt1=$_POST['tgl1'];
                  $dt2=$_POST['tgl2'];
                  $barang=$_POST['barang'];
                  echo "<b>Informasi : </b><i> Pencarian <b>kelompok barang</b> berdasarkan $barang</i>";?>
                <?php $query1= "SELECT nm_pen, sum(qty_barang) AS QTY FROM transaksi LEFT JOIN barang ON transaksi.id_barang = barang.id_barang LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis JOIN penjual on faktur_rinci.id_penjual=penjual.id_penjual JOIN kota on penjual.kota=kota.id_kota 
                where tgl_rinci BETWEEN '$dt1' AND '$dt2' AND nm_barang= '$barang' GROUP BY penjual.id_penjual order by QTY desc limit 10 "; 
                $resultt=mysqli_query($koneksi,$query1);
                $resnum = mysqli_num_rows($result1);?>
                    <thead class="thead-primary">
                <tr>
                    <th><p style="text-align: center ; color:#000000">No</th>
                    <th><p style="text-align: center ; color:#000000">Kelompok</th>
                    <th><p style="text-align: center ; color:#000000">Jumlah Penjualan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php $nomor=1;
                     $total=0;
                    while($db1=$resultt->fetch_assoc()){ ?>
                        <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $db1['nm_pen'];?></td>
                        <td><?php echo $db1['QTY'];?></td>
                        </tr>
                        </tr>
                
                    <?php }  ?>
                 <?php } ?>