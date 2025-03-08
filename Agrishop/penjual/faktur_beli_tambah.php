<!--UNTUK KODE FAKTUR Bertambah-->
<?php
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_faktur_beli) as kodeTerbesar FROM faktur_beli");
    $data1 = mysqli_fetch_array($query1);
    $id_faktur_beli = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_faktur_beli, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "FBTLRI";
    $id_faktur_beli = $huruf . sprintf("%03s", $urutan);
?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH FAKTUR BELI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label> ID Faktur Beli </label>
                    <input type="text" class="form-control" name="id_faktur_beli" readonly value="<?php echo $id_faktur_beli;?> ">
                    </div>

                    <div class="form-group">
                    <label> Total Barang </label>
                    <input type="text" class="form-control" name="tot_barang">
                    </div>
           
                    <div class="form-group">
                    <label> Total Bayar </label>
                    <input type="text" class="form-control" name="tot_bayar">
                    </div>

                    <div class="form-group">
                    <label> QTY  </label>
                    <input type="text" class="form-control" name="qty">
                    </div>

                    <div class="form-group">
                    <label> Tanggal Faktur Beli </label>
                    <input type="date" class="form-control" name="tgl">
                    </div>

                    <div class="form-group">
                    <label> Nomor Pembayaran </label>
                    <input type="text" class="form-control" name="no_pembayaran">
                    </div>

                    <div class="form-group">
                    <label> Nomor Rekening </label>
                    <input type="text" class="form-control" name="no_rekening">
                    </div>

                    <div class="form-group">
                        <label> Id Jenis Pembayaran </label>
                        <select class="form-control" name="id_jasa_pembayaran" required>
                            <option value = "---">
                        <?php $ambildata=$koneksi->query("SELECT * FROM jasa_pembayaran");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['id_jasa_pembayaran'] ?>" > <?php echo $pecah['id_jasa_pembayaran'] ?>--<?php echo $pecah['nm_jasa_pembayaran'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form=group">
                        <label> Id Diskon </label>
                        <select class="form-control" name="id_diskon" required>
                            <option value = "---">
                        <?php $ambil1=$koneksi->query("SELECT * FROM diskon");?>
                        <?php while($pecah=$ambil1->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_diskon']?>"> <?php echo $pecah['id_diskon']?> --- <?php echo $pecah['nm_diskon']?></option>
                        <?php } ?>
                        </select>
                    </div><br/>

                    <div class="form=group">
                        <label> Id Pembeli </label>
                        <select class="form-control" name="id_pembeli" required>
                            <option value = "---">
                        <?php $ambil1=$koneksi->query("SELECT * FROM pembeli");?>
                        <?php while($pecah=$ambil1->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_pembeli']?>"> <?php echo $pecah['id_pembeli']?> --- <?php echo $pecah['nm_pembeli']?></option>
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

                    <div class="form=group">
                        <label> Id Status Pembayaran </label>
                        <select class="form-control" name="id_status_pembayaran" required>
                            <option value = "---">
                        <?php $ambil1=$koneksi->query("SELECT * FROM status_pembayaran");?>
                        <?php while($pecah=$ambil1->fetch_assoc()){?>
                        <option value="<?php echo $pecah['id_status_pembayaran']?>"> <?php echo $pecah['id_status_pembayaran']?> --- <?php echo $pecah['nm_stat_pembayaran']?></option>
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
    $koneksi->query("INSERT INTO faktur_beli (id_faktur_beli, id_jasa_pembayaran, id_diskon,id_pembeli, id_penjual, id_status_pembayaran, tot_barang, tot_bayar, qty, tgl, no_pembayaran, no_rekening)
    VALUES ('$id_faktur_beli','$_POST[id_jasa_pembayaran]' ,'$_POST[id_diskon]','$_POST[id_pembeli]','$_POST[id_penjual]' ,'$_POST[id_status_pembayaran]' ,'$_POST[tot_barang]','$_POST[tot_bayar]','$_POST[qty]','$_POST[tgl]','$_POST[no_pembayaran]','$_POST[no_rekening]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<script>location='index.php?halaman=faktur_beli';</script>";
}
else if (isset ( $_POST['reset'])) 
{
    echo "<div class='alert alert-info'> Reset Data </div>";
    echo "<script>location='index.php?halaman=faktur_beli_tambah';</script>";
}
?>