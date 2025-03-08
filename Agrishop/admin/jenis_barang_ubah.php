<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH JENIS BARANG
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM jenis_barang WHERE id_jenis='$_GET[id_jenis]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Jenis Barang </label>
		<input type="text" class="form-control" name="id_jenis" value="<?php echo $pecah['id_jenis'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jenis Barang </label>
		<input type="text" class="form-control" name="nm_jns_brg" value="<?php echo $pecah['nm_jns_brg'];?>">
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
	$koneksi->query("UPDATE jenis_barang SET id_jenis='$_POST[id_jenis]',
	nm_jns_brg='$_POST[nm_jns_brg]' WHERE id_jenis='$_GET[id_jenis]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=jenis_barang';</script>";
}
?>
	