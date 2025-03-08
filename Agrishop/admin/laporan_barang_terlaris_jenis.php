<?php

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="agrishop";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);


  $semuadata=array();
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
     if(isset($_GET['jenis'])){
      $jenis = $_GET['jenis'];
      $strc[] = "kelompok_barang.id_jenis= '$jenis'";
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

    $query_jenis  = "SELECT * FROM jenis_barang";
    $result_jenis = mysqli_query($koneksi,$query_jenis);
?>


      <!-- Content -->
      <div class="container-fluid px-4">
                        <h3 class="mt-4">JENIS BARANG TERLARIS</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?halaman=laporan_barang_terlaris">Dashboard</a></li>
                            <li class="breadcrumb-item active">LAPORAN PRODUK TERLARIS</li>
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
      <label>  Jenis Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="jenis" class="form-control">
                        <option selected disabled>-- JENIS BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($result_jenis)) { ?>
                                <option value="<?php echo $row['nm_jns_brg']; ?>"> <?php echo $row['nm_jns_brg']; ?></option>
                             <?php } ?>
                        </select>
                      </div></div>
      
      <div class="col-md-2">
        <div class="form-group">
        <label>&nbsp; </label><br>
          <button  name="proses" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Lihat</button>
        </div>
      </div>
    </div>
  </form>
  
  <?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['proses']))
    {
      //menangkap nilai form
      $dt1=$_POST['tgl1'];
      $dt2=$_POST['tgl2'];

  if((!empty($dt1) && empty($dt2)) || (empty($dt1) && !empty($dt2)))
  {
    //jika data tanggal kosong
?>
  
      
<?php
    }
    else
    {
?>

  <br>
    <i>
      <b>Informasi : </b> 
        Hasil pencarian data berdasarkan periode Tanggal 
        <b>
          <?php echo $_POST['tgl1']?>
        </b> 
          s/d 
          <b>
            <?php echo $_POST['tgl2']?>
          </b>
    </i>
<br>
    
<?php
if(!empty($dt1) && !empty($dt2))
{
    $ambil= mysqli_query ($koneksi,"SELECT nm_barang, nm_jns_brg, sum(qty_barang) AS jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.id_barang = barang.id_barang
    LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci
    JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang
    JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis
              
    where  (tgl_rinci BETWEEN '$dt1' AND '$dt2') GROUP BY barang.nm_barang  order by jumlah desc limit 10");

}
if(!empty($_POST['jenis']))
{
    $jenis=$_POST['jenis'];
    echo "<i><b>Informasi : </b> Pencarian berdasarkan $jenis </i>";
    $ambil= mysqli_query ($koneksi,"SELECT nm_barang, nm_jns_brg, sum(qty_barang) AS jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.id_barang = barang.id_barang
    LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci
    JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang
    JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis
              
    where nm_jns_brg= '$jenis' GROUP BY barang.nm_barang  order by jumlah desc limit 10");
}
if(!empty($_POST['jenis']) && !empty($dt1) && !empty($dt2))
{
    $jenis=$_POST['jenis'];
    $ambil= mysqli_query ($koneksi,"SELECT nm_barang, nm_jns_brg, sum(qty_barang) AS jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.id_barang = barang.id_barang
    LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci
    JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang
    JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis
              
    where (tgl_rinci BETWEEN '$dt1' AND '$dt2' AND nm_jns_brg= '$jenis') 
    GROUP BY barang.nm_barang  order by Jumlah desc limit 10");
}
if(empty($_POST['jenis']) && empty($dt1) && empty($dt2))
{
    $ambil= mysqli_query ($koneksi,"SELECT nm_barang, nm_jns_brg, sum(qty_barang) AS jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.id_barang = barang.id_barang
    LEFT JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci
    JOIN kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang
    JOIN jenis_barang On kelompok_barang.id_jenis=jenis_barang.id_jenis GROUP BY barang.nm_barang order by jumlah desc limit 10");
}
  }
?>

</p> 

  <table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Jenis Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['nm_barang']; ?> </td>
        <td><?php echo $row['jumlah']; ?></td>
      </tr>
      <?php $total+=($row['jumlah']);?>
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



    <table>
      <tr>
                <td colspan="8" align="center"> 
                <?php
                  //jika pencarian data tidak ditemukan
                  if(mysqli_num_rows($ambil)==0)
                  {
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                  }
              ?>
                </td>
            </tr> 
        </table>
<?php
    }
    else
    {
        unset($_POST['proses']);
    
    }
?>
<?php if (isset($_POST['proses'])): ?>
        <button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index.php?halaman=laporanterlaris3'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembal
          </button>
          </span>
      <?php endif ?>

  
  </div>
    </div>