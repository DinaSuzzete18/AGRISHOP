<!--UNTUK KODE Pembeli Bertambah-->
<?php
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_pembeli) as kodeTerbesar FROM pembeli");
    $data1 = mysqli_fetch_array($query1);
    $id_pembeli = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_pembeli, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "PMBAGR";
    $id_pembeli = $huruf . sprintf("%03s", $urutan);
?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH PEMBELI
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
	<div class="form=group">
		<label>Id Pembeli </label>
		<input type="text" class="form-control" name="id_pembeli" readonly value="<?php echo $id_pembeli?>">
	</div>
	
	<div class="form=group">
		<label>Nama Pembeli </label>
		<input type="text" class="form-control" name="nm_pembeli" >
	</div>


	<div class="form=group">
		<label>Ussername Pembeli </label>
		<input type="text" class="form-control" name="usser_pembeli" >
	</div>

	<div class="form=group">
		<label>Password Pembeli </label>
		<input type="text" class="form-control" name="pw_pembeli" >
	</div>

	<div class="form=group">
		<label>Alamat Pembeli </label>
		<input type="text" class="form-control" name="almt_pembeli" >
	</div>
	
	<div class="form=group">
		<label>No HP Pembeli </label>
		<input type="text" class="form-control" name="no_hp_pembeli" >
	</div>

	<div class="form=group">
		<label>No Rekening Pembeli </label>
		<input type="text" class="form-control" name="no_rek_pembeli" >
	</div>

	<div class="form=group">
		<label> Id Jenis Pembeli </label>
		<select class="form-control" name="id_jenis_pembeli" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM jenis_pembeli");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_jenis_pembeli']?>"> <?php echo $pecah['id_jenis_pembeli']?> --- <?php echo $pecah['nm_jenis_pembeli']?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form=group">
		<label> Id Kota Pembeli </label>
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
	$koneksi->query("INSERT INTO pembeli (id_pembeli, id_jenis_pembeli, nm_pembeli, pw_pembeli, usser_pembeli, almt_pembeli, id_kota_tujuan, no_hp_pembeli, no_rek_pembeli) 
	VALUES ('$id_pembeli','$_POST[id_jenis_pembeli]', '$_POST[nm_pembeli]', '$_POST[pw_pembeli]', '$_POST[usser_pembeli]', '$_POST[almt_pembeli]', '$_POST[id_kota_tujuan]', '$_POST[no_hp_pembeli]', '$_POST[no_rek_pembeli]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembeli'>";
}
?>
	