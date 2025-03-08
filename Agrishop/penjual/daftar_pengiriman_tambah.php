<?php
 
	// mengambil data daftar pengiriman dengan kode paling besar
	$query1 = mysqli_query($koneksi, "SELECT max(id_daftar_pengiriman) as kodeTerbesar FROM daftar_pengiriman");
	$data1 = mysqli_fetch_array($query1);
	$id_daftar_pengiriman = $data1['kodeTerbesar'];
 
	// mengambil angka dari kode daftar pengiriman terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_daftar_pengiriman, 4, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode daftar pengiriman baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "DFRP";
	$id_daftar_pengiriman = $huruf . sprintf("%03s", $urutan);
	?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH DAFTAR PENGIRIMAN
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
	<div class="form=group">
		<label>Id Daftar Pengiriman </label>
		<input type="text" class="form-control" readonly value="<?php echo
		$id_daftar_pengiriman;?>">
	</div>

	<div class="form=group">
		<label>Tarif Pengiriman </label>
		<input type="text" class="form-control" name="tarif_pengiriman" >
	</div>

	<div class="form=group">
		<label> Id Sistem Pengiriman </label>
		<select class="form-control" name="id_sistem_pengiriman" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM sistem_pengiriman JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_sistem_pengiriman']?>"> <?php echo $pecah['id_sistem_pengiriman']?> --- <?php echo $pecah['nm_sistem_pengiriman']?> --- <?php echo $pecah['nm_jasa_kirim']?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form=group">
		<label> Kategori </label>
		<select class="form-control" name="id_kategori" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM kategori");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_kategori']?>"> <?php echo $pecah['id_kategori']?> --- <?php echo $pecah['nm_kategori']?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form=group">
		<label> Kota Asal </label>
		<select class="form-control" name="id_kota_asal" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM kota");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_kota']?>"> <?php echo $pecah['id_kota']?> --- <?php echo $pecah['nm_kota']?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form=group">
		<label> Kota Tujuan </label>
		<select class="form-control" name="id_kota_tujuan" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM kota");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_kota']?>"> <?php echo $pecah['id_kota']?> --- <?php echo $pecah['nm_kota']?></option>
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
	$koneksi->query("INSERT INTO daftar_pengiriman (id_daftar_pengiriman, tarif_pengiriman, id_sistem_pengiriman, id_kategori, id_kota_asal, id_kota_tujuan) 
	VALUES ('$id_daftar_pengiriman','$_POST[tarif_pengiriman]', '$_POST[id_sistem_pengiriman]', '$_POST[id_kategori]', '$_POST[id_kota_asal]', '$_POST[id_kota_tujuan]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=daftar_pengiriman'>";
}
?>
	