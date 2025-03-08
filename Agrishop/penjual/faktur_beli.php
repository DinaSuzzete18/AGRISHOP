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
          <option value=" " >Pilih status Bayar</option>
          <option value="Sudah Bayar">Sudah Bayar</option>
          <option value="Belum Bayar">Belum Bayar</option>
          <option value="Sedang di Verifikasi">Sedang di Verifikasi</option>
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
    <h3 class="card-title">Faktur</h3>
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
    <?php $ambil=$koneksi->query("SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran");?>
    <?php while($pecah=$ambil->fetch_assoc()){?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td> <?php echo $pecah['id_faktur_beli']; ?></td>
      <td><?php echo $pecah['tgl']; ?></td>
      <td> <?php echo $pecah['nm_pembeli']; ?></td>
      <td><?php echo $pecah['nm_stat_pembayaran']; ?></td>
      <td><?php echo $pecah['nm_jasa_pembayaran']; ?></td>
      <td><?php echo $pecah['tot_barang']; ?></td>
      <td>Rp.<?php echo number_format ($pecah['tot_bayar']); ?></td>
      <td><?php echo $pecah['qty']; ?></td>
      <td><?php echo $pecah['no_rekening']; ?></td>
      <td><?php echo $pecah['no_pembayaran']; ?></td>
      <td> 
        <a href="index.php?halaman=faktur_beli_hapus&id_faktur_beli=<?php echo $pecah['id_faktur_beli']; ?>" class="btn-danger btn"> Hapus </a>
        <a href="index.php?halaman=faktur_beli_ubah&id_faktur_beli=<?php echo $pecah['id_faktur_beli']; ?>"class="btn-warning btn"> Ubah </a> 
        <a href="index.php?halaman=faktur_beli_detail&id_faktur_beli=<?php echo $pecah['id_faktur_beli']; ?>"class="btn btn-info"> Detail </a> 
          <?php if (($pecah['id_status_pembayaran']!="STAPEM003") AND ($pecah['id_status_pembayaran']!="STAPEM001")): ?>
          <a href="index.php?halaman=lihat_pembayaran&id_faktur_beli=<?php echo $pecah['id_faktur_beli']; ?>"class="btn btn-success"> Lihat Pembayaran </a>
      </td>
    </tr>
    <?php endif ?>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
            <a href="index.php?halaman=faktur_beli_tambah" class = "btn btn-primary"> Tambah Data </a>
</div>
</div>
</tbody>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>