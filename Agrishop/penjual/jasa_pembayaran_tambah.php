<!--UNTUK KODE FAKTUR Bertambah-->
<?php
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_jasa_pembayaran) as kodeTerbesar FROM jasa_pembayaran");
    $data1 = mysqli_fetch_array($query1);
    $id_jasa_pembayaran = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_jasa_pembayaran, 5, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "JSPem";
    $id_jasa_pembayaran = $huruf . sprintf("%03s", $urutan);
?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JASA PEMBAYARAN
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Jasa Pembayaran </label>
		<input type="text" class="form-control" name="id_jasa_pembayaran" readonly value=<?php echo $id_jasa_pembayaran;?>>
	</div>

	<div class="form-group">
		<label> Nama Jasa Pembayaran </label>
		<input type="text" class="form-control" name="nm_jasa_pembayaran">
	</div>

	<div class="form-group">
		<label> Id Jenis Barang</label>
		<select class="form-control" name="id_jenis_pembayaran" required>
		<?php $ambill=$koneksi->query("SELECT * FROM jenis_pembayaran ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_jenis_pembayaran'] ?>" > <?php echo $pecah['id_jenis_pembayaran'] ?>-<?php echo $pecah['nm_jenis_pembayaran'] ?></option>
		<?php } ?>
		</select>
	</div>

	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
</div>
</div>
</div>
</div>
</div>

<?php
if (isset($_POST['save']))
{
	$koneksi->query("INSERT INTO jasa_pembayaran (id_jasa_pembayaran, nm_jasa_pembayaran, id_jenis_pembayaran) 
	VALUES ('$id_jasa_pembayaran','$_POST[nm_jasa_pembayaran]', '$_POST[id_jenis_pembayaran]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jasa_pembayaran'>";
}
?>
	