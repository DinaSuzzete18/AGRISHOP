<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH DAFTAR PENGIRIMAN
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM daftar_pengiriman WHERE id_daftar_pengiriman='$_GET[id_daftar_pengiriman]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Daftar Pengiriman </label>
		<input type="text" class="form-control" name="id_daftar_pengiriman" value="<?php echo $pecah['id_daftar_pengiriman'];?>">
	</div> </br>

	<div class="form=group">
		<label>Tarif Pengiriman </label>
		<input type="text" class="form-control" name="tarif_pengiriman" value="<?php echo $pecah['tarif_pengiriman'];?>">
	</div> </br>

	<div class="form=group">
		<label> Id Sistem Pengiriman </label>
		<select class="form-control" name="id_sistem_pengiriman" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM sistem_pengiriman JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_sistem_pengiriman']?>"> <?php echo $pecah['id_sistem_pengiriman']?> --- <?php echo $pecah['nm_sistem_pengiriman']?> --- <?php echo $pecah['nm_jasa_kirim']?></option>
		<?php } ?>
		</select>
	</div> </br>

	<div class="form=group">
		<label> Kategori </label>
		<select class="form-control" name="id_kategori" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM kategori");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_kategori']?>"> <?php echo $pecah['id_kategori']?> --- <?php echo $pecah['nm_kategori']?></option>
		<?php } ?>
		</select>
	</div> </br>

	<div class="form=group">
		<label> Id Kota Asal </label>
		<select class="form-control" name="id_kota_asal" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM kota");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_kota']?>"> <?php echo $pecah['id_kota']?> --- <?php echo $pecah['nm_kota']?></option>
		<?php } ?>
		</select>
	</div> </br>
	
	<div class="form=group">
		<label> Id Kota Tujuan </label>
		<select class="form-control" name="id_kota_tujuan" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM kota");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_kota']?>"> <?php echo $pecah['id_kota']?> --- <?php echo $pecah['nm_kota']?></option>
		<?php } ?>
		</select>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE daftar_pengiriman SET id_daftar_pengiriman='$_POST[id_daftar_pengiriman]', tarif_pengiriman='$_POST[tarif_pengiriman]', id_sistem_pengiriman='$_POST[id_sistem_pengiriman]',
	id_kategori='$_POST[id_kategori]', id_kota_asal='$_POST[id_kota_asal]',
	id_kota_tujuan='$_POST[id_kota_tujuan]' WHERE id_daftar_pengiriman='$_GET[id_daftar_pengiriman]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=daftar_pengiriman';</script>";
}
?>