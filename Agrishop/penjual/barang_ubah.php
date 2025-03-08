<div class="container" style="margin-top: 5px" center>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
             UBAH BARANG
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM barang WHERE id_barang='$_GET[id_barang]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Barang </label>
		<input type="text" class="form-control" name="id_barang" value="<?php echo $pecah['id_barang'];?>">
	</div>

	<div class="form=group">
		<label>Nama Barang </label>
		<input type="text" class="form-control" name="nm_barang" value="<?php echo $pecah['nm_barang'];?>">
	</div>

	<div class="form-group">
		<label> Kelompok Barang </label>
		<select class="form-control" name="id_kelompok_barang" required>
		<?php $ambill=$koneksi->query("SELECT * FROM kelompok_barang ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option focus value="<?php echo $pecah['id_kelompok_barang'] ?>" > <?php echo $pecah['id_kelompok_barang'] ?>-<?php echo $pecah['nm_kelompok_barang'] ?></option>
	<?php } ?>
	</select>
	</div>

	<div class="form=group">
		<?php $ambilll=$koneksi->query("SELECT * FROM barang WHERE id_barang='$_GET[id_barang]' ");?>
		<?php $pecah=$ambilll->fetch_assoc()?>
		<img src="photo/<?php echo $pecah['foto_barang']?>" width="200">
	</div>
	<div class="form=group">
		<label> Ubah Foto </label>
		<input type="file" name="foto_barang" class="form-control">
	</div>

	<div class="form=group">
		<label>Deskripsi Barang </label>
		<input type="text" class="form-control" name="deskripsi" value="<?php echo $pecah['deskripsi'];?>">
	</div>

	<div class="form=group">
		<label>Berat Barang </label>
		<input type="text" class="form-control" name="berat" value="<?php echo $pecah['berat'];?>">
	</div>

	<div class="form=group">
		<label>Stok Barang </label>
		<input autocomplate="off" type="text" class="form-control" name="stok" value="<?php echo $pecah['stok'];?>">
	</div>

	</div>
		<div class="form=group">
		<label> Harga </label>
		<input type="text" class="form-control" name="harga" value="<?php echo $pecah['harga'];?>">
	</div>

	<div class="form=group">
		<label> ID Penjual </label>
		<select class="form-control" name="id_penjual" required>
		<?php $ambill=$koneksi->query("SELECT * FROM penjual ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_penjual'] ?>" > <?php echo $pecah['id_penjual'] ?>--<?php echo $pecah['nm_pen'] ?></option>
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
	$namafoto=$_FILES['foto_barang']['name'];
	$lokasifoto=$_FILES['foto_barang']['tmp_name'];
	//jika foto dirubah
	if(!empty($lokasifoto))
		{
			move_uploaded_file($lokasifoto, "penjual/photo/$namafoto");
		
	$koneksi->query("UPDATE barang SET id_barang='$_POST[id_barang]', 
		nm_barang='$_POST[nm_barang]', 
		id_kelompok_barang='$_POST[id_kelompok_barang]', 
	foto_barang='$namafoto', 
	deskripsi='$_POST[deskripsi]', 
	berat='$_POST[berat]', 
	stok='$_POST[stok]', 
	harga='$_POST[harga]', id_penjual='$_POST[id_penjual]' WHERE id_barang='$_GET[id_barang]'");

	echo "<script> alert(' Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=barang';</script>";
		}
	else
	{
		$koneksi->query("UPDATE barang SET id_barang='$_POST[id_barang]',
			nama_barang='$_POST[nm_barang]', 
			id_kelompok_barang='$_POST[id_kelompok_barang]',
		deskripsi='$_POST[deskripsi]',
		berat='$_POST[berat]', 
		stok='$_POST[stok]', 
		harga='$_POST[harga]', id_penjual='$_POST[id_penjual]' 
		WHERE id_barang='$_GET[id_barang]'");
	}
}
?>
	