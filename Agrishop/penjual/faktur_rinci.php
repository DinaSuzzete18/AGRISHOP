  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="table/css/style.css">
  <section>
          <h4 class="text-center mb-4"> Faktur Rinci</h4>
          <form method="post" action="index.php?halaman=faktur_rinci_cari">
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
        <label>Status Pengiriman</label>
        <select class="form-control" name="status1">
          <option value=" " >Pilih Status Pengiriman</option>
          <option value="Di Terima">Di Terima</option>
          <option value="Belum Di Kirim">Belum Di Kirim</option>
          <option value="Dalam Packing">Dalam Packing</option>
          <option value="Di Kirim">Di Kirim</option>
          <option value="Di batalkan">Di batalkan</option>
          <option value="Komplain">Komplain (Terima)</option>
        </select>
      </div>
    </div>
    
    <div class="col-md-2">
      <label></label><br>
      <button class="btn btn-primary" name="lihat">Lihat</button>
    </div>
    
    
  </div>
</form>

          </form>
          </div>
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-primary">
                <tr>
                  <th><b> No </b></th>
                  <th><b> Id Faktur Rinci </b></th>
                  <th><b> Id Faktur Beli </b></th>
                  <th><b> Status Pengiriman </b></th>
                  <th><b> Tanggal Faktur Rinci </b></th>
                  <th><b> Daftar Pengiriman </b></th>
                  <th><b> Status Transfer Penjual</b></th>
                  <th><b> Penjual </b></th>
                  <th><b> Transfer Uang Penjual </b></th>
                  <th><b> QTY Barang Per-toko </b></th>
                  <th><b> Total Bayar </b></th>
                  <th><b> Komen</b></th>
                  <th><b> Rating</b></th>
                  <th><b> Komplain</b></th>
                  <th><b> Aksi </b></th>
                </tr>
              </thead>
              <tbody>

                <?php $nomor=1;?>
                <?php $penghasilan=0;?>
                <?php $ambil=$koneksi->query("SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN status_pengiriman ON faktur_rinci.id_status_pengiriman=status_pengiriman.id_status_pengiriman JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman =daftar_pengiriman.id_daftar_pengiriman JOIN status_transfer_penjual ON faktur_rinci.id_status_transfer_penjual=status_transfer_penjual.id_status_transfer_penjual JOIN penjual ON faktur_rinci.id_penjual=penjual.id_penjual"); ?>
                <?php while ($pecah=$ambil->fetch_assoc()){ ?>
                <tr>
                  <td> <?php echo $nomor?> </td>
                  <td> <?php echo $pecah['id_faktur_rinci']?> </td>
                  <td> <?php echo $pecah['id_faktur_beli']?> </td>
                  <td> <?php echo $pecah['nm_status_pengiriman']?> </td>
                  <td> <?php echo $pecah['tgl_rinci']?> </td>
                  <td> <?php echo $pecah['id_daftar_pengiriman']?> </td>
                  <td> <?php echo $pecah['nm_status_transfer_penjual']?> </td>
                  <td> <?php echo $pecah['nm_pen']?> </td>
                  <td> RP. <?php echo number_format ($pecah['transfer_uang_penjual'])?> </td>
                  <td> <?php echo $pecah['qty_barang_per_toko']?> </td>
                  <td> RP. <?php echo number_format ($pecah['total_bayar'])?> </td>
                  <td> <?php echo $pecah['penilaian']?> </td>
                  <td> <?php echo $pecah['rating']?> </td>
                  <td> <img src="photo/<?php echo $pecah['komplain'];?>" width="120"></td>
                  <td>
                    <a href="index.php?halaman=faktur_rinci_hapus&id_faktur_rinci=<?php echo $pecah['id_faktur_rinci']; ?>" 
                    class="btn-danger btn"> Hapus </a>
                    <a href="index.php?halaman=faktur_rinci_ubah&id_faktur_rinci=<?php echo $pecah['id_faktur_rinci']; ?>" 
                    class="btn-warning btn"> Ubah </a> </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
              </tbody>
            </table>
            <br/>
            <a href="index.php?halaman=faktur_rinci_tambah" class = "btn btn-primary"> Tambah Data </a>
          </div>
        </div>
      </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>