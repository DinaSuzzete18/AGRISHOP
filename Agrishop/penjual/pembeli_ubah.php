<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH PEMBELI
            </div>
            <div class="card-body">
<?php
$ambil=$koneksi->query("SELECT * FROM pembeli WHERE id_pembeli='$_GET[id_pembeli]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Pembeli </label>
		<input type="text" class="form-control" name="id_pembeli" value="<?php echo $pecah['id_pembeli'];?>">
	</div>

	<div class="form=group">
		<label>Password Pembeli </label>
		<input type="text" class="form-control" name="pw_pembeli" value="<?php echo $pecah['pw_pembeli'];?>">
	</div>
	
	<div class="form=group">
		<label>Nama Pembeli </label>
		<input type="text" class="form-control" name="nm_pembeli" value="<?php echo $pecah['nm_pembeli'];?>">
	</div>

	<div class="form=group">
		<label>Password Pembeli </label>
		<input type="text" class="form-control" name="pw_pembeli" value="<?php echo $pecah['pw_pembeli'];?>">
	</div>

	<div class="form=group">
		<label>Ussername Pembeli </label>
		<input type="text" class="form-control" name="usser_pembeli" value="<?php echo $pecah['usser_pembeli'];?>">
	</div>

	<div class="form=group">
		<label>Alamat Pembeli </label>
		<input type="text" class="form-control" name="almt_pembeli" value="<?php echo $pecah['almt_pembeli'];?>">
	</div>
	
	<div class="form=group">
		<label>No HP Pembeli </label>
		<input type="text" class="form-control" name="no_hp_pembeli" value="<?php echo $pecah['no_hp_pembeli'];?>">
	</div>

	<div class="form=group">
		<label>No Rekening Pembeli </label>
		<input type="text" class="form-control" name="no_rek_pembeli" value="<?php echo $pecah['no_rek_pembeli'];?>">
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
	$koneksi->query("UPDATE pembeli SET id_pembeli='$_POST[id_pembeli]', id_jenis_pembeli='$_POST[id_jenis_pembeli]', nm_pembeli='$_POST[nm_pembeli]',
	pw_pembeli='$_POST[pw_pembeli]', usser_pembeli='$_POST[usser_pembeli]',
	almt_pembeli='$_POST[almt_pembeli]', no_hp_pembeli='$_POST[no_hp_pembeli]',
	  no_rek_pembeli='$_POST[no_rek_pembeli]' WHERE id_pembeli='$_GET[id_pembeli]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=pembeli';</script>";
}
?>