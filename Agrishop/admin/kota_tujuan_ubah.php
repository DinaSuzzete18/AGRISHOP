<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH KOTA
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM kota WHERE id_kota='$_GET[id_kota]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Kota </label>
		<input type="text" class="form-control" name="id_kota" value="<?php echo $pecah['id_kota'];?>">
	</div>
	<div class="form=group">
		<label>Nama Kota </label>
		<input type="text" class="form-control" name="nm_kota" value="<?php echo $pecah['nm_kota'];?>">
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
	$koneksi->query("UPDATE kota SET id_kota='$_POST[id_kota]',
	nm_kota='$_POST[nm_kota]' WHERE id_kota='$_GET[id_kota]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=kota_tujuan';</script>";
}
?>
	