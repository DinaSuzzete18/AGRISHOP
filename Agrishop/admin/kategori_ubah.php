<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH KATEGORI
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id_kategori]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Kategori </label>
		<input type="text" class="form-control" name="id_kategori" value="<?php echo $pecah['id_kategori'];?>">
	</div>
	<div class="form=group">
		<label>Nama Kategori </label>
		<input type="text" class="form-control" name="nm_kategori" value="<?php echo $pecah['nm_kategori'];?>">
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
	$koneksi->query("UPDATE kategori SET id_kategori='$_POST[id_kategori]',
	nm_kategori='$_POST[nm_kategori]' WHERE id_kategori='$_GET[id_kategori]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";
}
?>
	