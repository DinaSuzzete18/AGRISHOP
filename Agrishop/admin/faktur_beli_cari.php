  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="table/css/style.css">
  <section>
          <h4 class="text-center mb-4"> Faktur Beli</h4>
          <form method="post" action="index.php?halaman=faktur_beli_cari">
  <div class="row">
    <div class="col-md-3">
    <div class="form-group">
        <label> Dari Tanggal </label>
        <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai?>">
      </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
        <label> Sampai Tanggal </label>
        <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai?>">
      </div>
    </div>
    </div>
    <div class="row">
    
    <div class="col-md-3">
      <div class="form-group">
        <label>Status Bayar</label>
        <select class="form-control" name="status1">
          <option value=" " >Pilih status Kirim</option>
          <option value="Panding">Panding</option>
          <option value="Sudah Bayar">Sudah Bayar</option>
          <option value="Belum Bayar">Belum Bayar</option>
          <option value="Pembayaran Sedang Diverifikasi">Pembayaran Sedang Diverifikasi</option>
          <option value="Pembayaran Ditolak">Pembayaran Ditolak</option>
        </select>
      </div>
    </div>
    
    <div class="col-md-2">
      <label></label><br>
      <button class="btn btn-primary" name="lihat">Lihat</button>
    </div>
  </div>
</form>
<br>
<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if(isset($_POST["lihat"]))
{
  $tgl_mulai=$_POST["tglm"];
  $tgl_selesai=$_POST["tgls"];
  $status1=$_POST["status1"];
  $ambil=$koneksi->query("SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli 
    JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran 
    JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran
              WHERE nm_stat_pembayaran='$status1' AND tgl BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  while($pecah = $ambil->fetch_assoc())
  {
    $semuadata[]=$pecah;
  }
}



?>
<br>
<div class="container-fluid px-4">
<center><h3> Data Faktur dari <?php echo $tgl_mulai?> hingga <?php echo $tgl_selesai?> </h3>
</center>
</div>
<h3 class="card-title">Faktur Beli </h3>
    <!-- /.card-header -->
    <div class="table-wrap">
        
    <table class="table">
    <thead class="thead-primary">
    <tr>
      <th> No. </th>
      <th> ID Faktur Beli </th>
      <th> Tanggal </th>
      <th> Nama Pembeli </th>
      <th> Status Pembayaran </th>
      <th> Jasa Pembayaran </th>
      <th> Total Barang </th>
      <th> Total Bayar </th>
      <th> QTY </th>
      <th> No Rekening Pembeli </th>
      <th> No Pembayaran </th>
      <th> Aksi </th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1;?>
    <?php foreach ($semuadata as $key =>$value):?>
    <tr>
      <td><?php echo $key+1;?></td>
      <td> <?php echo $value['id_faktur_beli']; ?></td>
      <td><?php echo $value['tgl']; ?></td>
      <td> <?php echo $value['nm_pembeli']; ?></td>
      <td><?php echo $value['nm_stat_pembayaran']; ?></td>
      <td><?php echo $value['nm_jasa_pembayaran']; ?></td>
      <td><?php echo $value['tot_barang']; ?></td>
      <td>Rp.<?php echo number_format ($value['tot_bayar']); ?></td>
      <td><?php echo $value['qty']; ?></td>
      <td><?php echo $value['no_rekening']; ?></td>
      <td><?php echo $value['no_pembayaran']; ?></td>
      <td> 
        <a href="index.php?halaman=faktur_beli_hapus&id_faktur_beli=<?php echo $value['id_faktur_beli']; ?>" class="btn-danger btn"> Hapus </a>
        <a href="index.php?halaman=faktur_beli_ubah&id_faktur_beli=<?php echo $value['id_faktur_beli']; ?>"class="btn-warning btn"> Ubah </a> 
        <a href="index.php?halaman=faktur_beli_detail&id_faktur_beli=<?php echo $value['id_faktur_beli']; ?>"class="btn btn-info"> Detail </a> 
          <?php if (($value['id_status_pembayaran']!="STAPEM003") AND ($value['id_status_pembayaran']!="STAPEM001")): ?>
          <a href="index.php?halaman=lihat_pembayaran&id_faktur_beli=<?php echo $value['id_faktur_beli']; ?>"class="btn btn-success"> Lihat Pembayaran </a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
  <tfoot>
    </tr>
  </tfoot>
</table>
<a href="index.php?halaman=faktur_beli_tambah" class = "btn btn-primary"> Tambah Data </a>
</div>
</div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  
