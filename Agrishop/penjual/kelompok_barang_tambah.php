<?php
 
	// mengambil data daftar pengiriman dengan kode paling besar
	$query1 = mysqli_query($koneksi, "SELECT max(id_kelompok_barang) as kodeTerbesar FROM kelompok_barang");
	$data1 = mysqli_fetch_array($query1);
	$id_kelompok_barang = $data1['kodeTerbesar'];
 
	// mengambil angka dari kode daftar pengiriman terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_kelompok_barang, 4, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode daftar pengiriman baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "DFRP";
	$id_kelompok_barang = $huruf . sprintf("%03s", $urutan);
	?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              KELOMPOK BARANG
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Kelompok Barang </label>
		<input type="text" class="form-control" name="id_kelompok_barang" readonly value="<?php echo $id_kelompok_barang;?>">
	</div>
	<div class="form-group">
		<label> Nama Kelompok Barang </label>
		<input type="text" class="form-control" name="nm_kelompok_barang">
	</div>
	<div class="form-group">
        <label> Id Jenis Barang </label>
        <select class="form-control" name="id_jenis" required>
          <option value = "----">
          <?php $ambildata=$koneksi->query("SELECT * FROM jenis_barang");?>
          <?php while($pecah=$ambildata->fetch_assoc()){?>
       <option value="<?php echo $pecah['id_jenis'] ?>" > <?php echo $pecah['id_jenis'] ?>--<?php echo $pecah['nm_jns_brg'] ?></option>
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
	$koneksi->query("INSERT INTO kelompok_barang (id_kelompok_barang, nm_kelompok_barang, id_jenis) 
	VALUES ('$_POST[id_kelompok_barang]','$_POST[nm_kelompok_barang]', '$_POST[id_jenis]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kelompok_barang'>";
}
?>
	