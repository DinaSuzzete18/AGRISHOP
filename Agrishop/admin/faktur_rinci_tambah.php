<!--UNTUK KODE FAKTUR Bertambah-->
<?php
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_faktur_rinci) as kodeTerbesar FROM faktur_rinci");
    $data1 = mysqli_fetch_array($query1);
    $id_faktur_rinci = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_faktur_rinci, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "FTRRNC";
    $id_faktur_rinci = $huruf . sprintf("%03s", $urutan);
?>

<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH FAKTUR RINCI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label> ID Faktur Rinci </label>
                    <input type="text" class="form-control" name="id_faktur_rinci" readonly value=<?php echo $id_faktur_rinci;?>  >
                    </div>

                    <div class="form-group">
                    <label> Tanggal Faktur Rinci </label>
                    <input type="date" class="form-control" name="tgl_rinci">
                    </div>
                    
                    <div class="form-group">
                    <label> QTY Barang Per Toko  </label>
                    <input type="text" class="form-control" name="qty_barang_per_toko" >
                    </div>

                    <div class="form-group">
                    <label> Total Bayar </label>
                    <input type="text" class="form-control" name="total_bayar">
                    </div>

                    <div class="form-group">
                    <label> Transfer Uang Penjual </label>
                    <input type="text" class="form-control" name="transfer_uang_penjual">
                    </div>

                    <div class="form-group">
                        <label> Id Faktur Beli </label>
                        <select class="form-control" name="id_faktur_beli" required>
                            <option value = "---">
                        <?php $ambildata=$koneksi->query("SELECT * FROM faktur_beli");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['id_faktur_beli'] ?>" > <?php echo $pecah['id_faktur_beli'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form=group">
                        <label> Id Status Pengiriman </label>
                        <select class="form-control" name="id_status_pengiriman" required>
                            <option value = "---">
                        <?php $ambil1=$koneksi->query("SELECT * FROM status_pengiriman");?>
                        <?php while($pecah=$ambil1->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_status_pengiriman']?>"> <?php echo $pecah['id_status_pengiriman']?> --- <?php echo $pecah['nm_status_pengiriman']?></option>
                        <?php } ?>
                        </select>
                    </div><br/>

                    <div class="form=group">
                        <label> Id Daftar Pengiriman </label>
                        <select class="form-control" name="id_daftar_pengiriman" required>
                            <option value = "---">
                        <?php $ambil1=$koneksi->query("SELECT * FROM daftar_pengiriman");?>
                        <?php while($pecah=$ambil1->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_daftar_pengiriman']?>"> <?php echo $pecah['id_daftar_pengiriman']?></option>
                        <?php } ?>
                        </select>
                    </div><br/>

                    <div class="form=group">
                        <label> Id Status Transfer Penjual </label>
                        <select class="form-control" name="id_status_transfer_penjual" required>
                            <option value = "---">
                        <?php $ambil1=$koneksi->query("SELECT * FROM status_transfer_penjual");?>
                        <?php while($pecah=$ambil1->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_status_transfer_penjual']?>"> <?php echo $pecah['id_status_transfer_penjual']?> --- <?php echo $pecah['nm_status_transfer_penjual']?></option>
                        <?php } ?>
                        </select>
                    </div><br/>

                    <div class="form=group">
                        <label> Id Penjual </label>
                        <select class="form-control" name="id_penjual" required>
                            <option value = "---">
                        <?php $ambil1=$koneksi->query("SELECT * FROM penjual");?>
                        <?php while($pecah=$ambil1->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_penjual']?>"> <?php echo $pecah['id_penjual']?> --- <?php echo $pecah['nm_pen']?></option>
                        <?php } ?>
                        </select>
                    </div><br/>
                <button class="btn btn-primary" name="save"> SIMPAN </button>
                <button type="reset" class="btn btn-warning">RESET</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
if (isset ( $_POST['save']))
{
    $koneksi->query("INSERT INTO faktur_rinci (id_faktur_rinci, id_faktur_beli, id_status_pengiriman,tgl_rinci, id_daftar_pengiriman, id_status_transfer_penjual, id_penjual, transfer_uang_penjual, qty_barang_per_toko, total_bayar )
    VALUES ('$id_faktur_rinci','$_POST[id_faktur_beli]' ,'$_POST[id_status_pengiriman]','$_POST[tgl_rinci]', '$_POST[id_daftar_pengiriman]','$_POST[id_status_transfer_penjual]' ,'$_POST[id_penjual]','$_POST[transfer_uang_penjual]','$_POST[qty_barang_per_toko]','$_POST[total_bayar]')");
    
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<script>location='index.php?halaman=faktur_rinci';</script>";
}
else if (isset ( $_POST['reset'])) 
{
    echo "<div class='alert alert-info'> Reset Data </div>";
    echo "<script>location='index.php?halaman=faktur_rinci_tambah';</script>";
}
?>