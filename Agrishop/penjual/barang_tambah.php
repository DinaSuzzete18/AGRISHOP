<?php
 
	// mengambil data barang dengan kode paling besar
	$query1 = mysqli_query($koneksi, "SELECT max(id_barang) as kodeTerbesar FROM barang");
	$data1 = mysqli_fetch_array($query1);
	$id_barang = $data1['kodeTerbesar'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_barang, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "BRG";
	$id_barang = $huruf . sprintf("%03s", $urutan);
	?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH BARANG
            </div>
            <div class="card-body">


<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label> Id Barang </label>
		<input type="text" class="form-control" name="id_barang" readonly value="<?php echo
		$id_barang;?>">
	</div>
	
	<div class="form-group">
		<label> Nama Barang </label>
		<input type="text" class="form-control" name="nm_barang">
	</div>
	
	<div class="form-group">
		<label> Kelompok Barang</label>
		<select class="form-control" name="id_kelompok_barang" required>
		<?php $ambill=$koneksi->query("SELECT * FROM kelompok_barang ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_kelompok_barang'] ?>" > <?php echo $pecah['id_kelompok_barang'] ?>-<?php echo $pecah['nm_kelompok_barang'] ?></option>
		<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
		<label> Foto_Barang </label>
		<input type="file" class="form-control" name="foto_barang">
	</div>

	<div class="form-group">
		<label> Deskripsi </label>
		<input type="text" class="form-control" name="deskripsi">
	</div>

	<div class="form-group">
		<label> Berat  </label>
		<input type="text" class="form-control" name="berat">
	</div>

	<div class="form-group">
		<label> Stok </label>
		<input type="text" class="form-control" name="stok">
	</div>

	<div class="form-group">
		<label> Harga </label>
		<input type="text" class="form-control" name="harga">
	</div>

	<div class="form-group">
		<label> Id Penjual</label>
		<select class="form-control" name="id_penjual" required>
		<option > </option>
		<?php $ambill=$koneksi->query("SELECT * FROM penjual ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_penjual'] ?>" > <?php echo $pecah['id_penjual'] ?>--<?php echo $pecah['nm_pen'] ?></option>
		<?php } ?>
		</select>
	</div>

	<button class="btn btn-primary" name="savee"> Simpan </button>
</form>
 </div>
        </div>
      </div>
    </div>
<?php
if (isset ( $_POST['savee']))
{
	$nama = $_FILES['foto_barang']['name'];
	$lokasi = $_FILES['foto_barang']['tmp_name'];
	move_uploaded_file($lokasi, "photo/".$nama);
	$tanggal=date("Y-m-d");
	$koneksi->query("INSERT INTO barang (id_barang, nm_barang, id_kelompok_barang, foto_barang, deskripsi, berat, stok, harga, id_penjual)
	VALUES ('$id_barang', 
	'$_POST[nm_barang]',
	'$_POST[id_kelompok_barang]', '$nama', 
	'$_POST[deskripsi]','$_POST[berat]',
	'$_POST[stok]',
	'$_POST[harga]',
	'$_POST[id_penjual]')");
	
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";

}
?>