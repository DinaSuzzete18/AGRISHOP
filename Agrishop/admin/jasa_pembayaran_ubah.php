<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH JASA PEMBAYARAN
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM jasa_pembayaran WHERE id_jasa_pembayaran='$_GET[id_jasa_pembayaran]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Jasa Pembayaran </label>
		<input type="text" class="form-control" name="id_jasa_pembayaran" value="<?php echo $pecah['id_jasa_pembayaran'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jasa Pembayaran </label>
		<input type="text" class="form-control" name="nm_jasa_pembayaran" value="<?php echo $pecah['nm_jasa_pembayaran'];?>">
	</div>

	<div class="form=group">
		<label> ID Jenis Pembayaran </label>
		<select class="form-control" name="id_jenis_pembayaran" required>
		<?php $ambill=$koneksi->query("SELECT * FROM jenis_pembayaran ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_jenis_pembayaran'] ?>" > <?php echo $pecah['id_jenis_pembayaran'] ?>--<?php echo $pecah['nm_jenis_pembayaran'] ?></option>
	<?php } ?>
	</select>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
</div>
</div>
</div>
</div>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE jasa_pembayaran SET id_jasa_pembayaran='$_POST[id_jasa_pembayaran]',
	nm_jasa_pembayaran='$_POST[nm_jasa_pembayaran]', id_jenis_pembayaran='$_POST[id_jenis_pembayaran]'  WHERE id_jasa_pembayaran='$_GET[id_jasa_pembayaran]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=jasa_pembayaran';</script>";
}
?>