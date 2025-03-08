      <div class="container-fluid px-4">
                        <h6 class="mt-4">LAPORAN BARANG TERLARIS</h6>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?halaman=laporan_barang_terlaris">Dashboard Laporan Barang Terlaris</a></li>
                            <li class="breadcrumb-item active">BERDASARKAN PENJUAL</li>
                        </ol>
</div>
      <form class="form-inline" role="search" method="post" action="index.php?halaman=laporan_barang_terlaris_penjual">
      <div class="col-10">
      <table border="0">
      <tr><div class="col-md-3">
    <div class="form-inline">
      <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Jenis Barang..." autofocus autocomplete="off"><br>
    <div class="text-end">
      <button class="btn btn-primary" name="cari">Cari</button>
    </div>
    </div>
  </div>
</tr>
</table>
</div>
</form>
<?php
include 'koneksi.php';
if(isset($_POST['cari']))
{
  $_SESSION['session_pencarian'] = $_POST["keyword"];
  $keyword=$_SESSION['session_pencarian'];
}
else
{
  $keyword=$_SESSION['session_pencarian'];
}
$query= mysqli_query ($koneksi,"SELECT * FROM penjual
where nm_pen LIKE '%$keyword%'");
?> 

<br><?php echo "<i><b>Informasi : </b> Pencarian berdasarkan Nama Penjual '$keyword' </i>";?>
                            <div class="table-responsive">
                                <table class="table table-bordered text-light">
                                    <thead class='bg-primary'>
                                        <tr>
                                          <th>No</th>
                                          <th>Nama Penjual</th>
                                          <th>Jumlah Barang Terjual</th>
                                        </tr>
                                <tbody>
                                <?php 
                                             $ambildata =mysqli_query($koneksi, "SELECT nm_barang, SUM(transaksi.qty_barang) AS jumlah FROM transaksi INNER JOIN barang ON transaksi.id_barang=barang.id_barang INNER JOIN kelompok_barang ON kelompok_barang.id_kelompok_barang=barang.id_kelompok_barang INNER JOIN jenis_barang ON jenis_barang.id_jenis=kelompok_barang.id_jenis INNER JOIN penjual ON penjual.id_penjual=barang.id_penjual INNER JOIN kota ON penjual.kota=kota.id_kota");
                                                 $No =1 ;
                                                 $total=0;
                                                  $jumlah= mysqli_num_rows($ambildata);
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>

                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['nm_barang'];?></td>
                                                   <td><?php echo $db['jumlah'];
                                               ?></td>

                                  </tr>
      <?php $total+=($db['jumlah']);?>
      <?php $No++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table>