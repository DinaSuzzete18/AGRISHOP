<div class="container" style="margin-top: 5px" center>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
             KELOMPOK BARANG 
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM kelompok_barang WHERE id_kelompok_barang='$_GET[id_kelompok_barang]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Kelompok Barang </label>
		<input type="text" class="form-control" name="id_kelompok_barang" value="<?php echo $pecah['id_kelompok_barang'];?>">
	</div>

	<div class="form=group">
		<label>Nama Kelompok Barang </label>
		<input type="text" class="form-control" name="nm_kelompok_barang" value="<?php echo $pecah['nm_kelompok_barang'];?>">
	</div>

	<div class="form-group">
		<label> Id Jenis Barang </label>
		<select class="form-control" name="id_jenis" required>
		<?php $ambill=$koneksi->query("SELECT * FROM jenis_barang ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option focus value="<?php echo $pecah['id_jenis'] ?>" > <?php echo $pecah['id_jenis'] ?>-<?php echo $pecah['nm_jns_brg'] ?></option>
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
	$koneksi->query("UPDATE kelompok_barang SET id_kelompok_barang='$_POST[id_kelompok_barang]',
	nm_kelompok_barang='$_POST[nm_kelompok_barang]', id_jenis='$_POST[id_jenis]'  WHERE id_kelompok_barang='$_GET[id_kelompok_barang]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=kelompok_barang';</script>";
}
?>
	