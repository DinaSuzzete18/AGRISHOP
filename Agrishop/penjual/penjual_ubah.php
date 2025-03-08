<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH PENJUAL
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM penjual WHERE id_penjual='$_GET[id_penjual]'");
$pecah=$ambil->fetch_assoc ();

?>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Penjual </label>
		<input type="text" class="form-control" name="id_penjual" value="<?php echo $pecah['id_penjual'];?>">
	</div>
	<div class="form=group">
		<label>Nama Penjual </label>
		<input type="text" class="form-control" name="nm_pen" value="<?php echo $pecah['nm_pen'];?>">
	</div>
	<div class="form=group">
		<label>Alamat Penjual </label>
		<input type="text" class="form-control" name="alamat_pen" value="<?php echo $pecah['alamat_pen'];?>">
	</div>
	<div class="form=group">
		<label>No HP Penjual </label>
		<input type="text" class="form-control" name="no_hp_penjual" value="<?php echo $pecah['no_hp_penjual'];?>">
	</div>
	<div class="form=group">
		<label>Username Penjual </label>
		<input type="text" class="form-control" name="username_penjual" value="<?php echo $pecah['username_penjual'];?>">
	</div>
	<div class="form=group">
		<label>Password Penjual </label>
		<input type="text" class="form-control" name="password_penjual" value="<?php echo $pecah['password_penjual'];?>">
	</div>
	<div class="form=group">
		<label>No Rekening Penjual </label>
		<input type="text" class="form-control" name="no_rek_penjual" value="<?php echo $pecah['no_rek_penjual'];?>">
	</div>
	<div class="form-group">
              <label> Tanggal Daftar Penjual </label>
              <input type="date" class="form-control" name="tanggal_daftar">
           </div>
	<div class="form=group">
		<label> Id BANK </label>
		<select class="form-control" name="id_bank" required>
		<?php $ambil1=$koneksi->query("SELECT * FROM bank");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_bank']?>"> <?php echo $pecah['id_bank']?> --- <?php echo $pecah['nm_bank']?></option>
		<?php } ?>
		</select>
	</div>
	<div class="form=group">
			<label> Kota </label>
			<select class="form-control" name="id_kota" required>
				<?php $ambil1=$koneksi->query("SELECT * FROM kota");?>
				<?php while($pecah=$ambil1->fetch_assoc()){?>
				<option value="<?php echo $pecah['id_kota']?>"> <?php echo $pecah['id_kota']?> --- <?php echo $pecah['nm_kota']?></option>
				<?php } ?>
			</select>
	</div>

	<br/>
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
	$koneksi->query("UPDATE penjual SET id_penjual='$_POST[id_penjual]', id_bank='$_POST[id_bank]',
nm_pen='$_POST[nm_pen]', alamat_pen='$_POST[alamat_pen]', kota='$_POST[id_kota]', no_hp_penjual='$_POST[no_hp_penjual]', username_penjual='$_POST[username_penjual]', password_penjual='$_POST[password_penjual]', tanggal_daftar='$_POST[tanggal_daftar]' WHERE id_penjual='$_GET[id_penjual]'");

	$koneksi->query("UPDATE penjual SET no_rek_penjual='$_POST[no_rek_penjual]' WHERE id_penjual='$_GET[id_penjual]'");
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=penjual';</script>";
}
?>
	