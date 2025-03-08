<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
             UBAH STATUS ORDER
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM status_order WHERE id_status_order='$_GET[id_status_order]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Status Order </label>
		<input type="text" class="form-control" name="id_status_order" value="<?php echo $pecah['id_status_order'];?>">
	</div>
	<div class="form=group">
		<label>Nama Status Order </label>
		<input type="text" class="form-control" name="nm_status_order" value="<?php echo $pecah['nm_status_order'];?>">
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
	$koneksi->query("UPDATE status_order SET id_status_order='$_POST[id_status_order]',
	nm_status_order='$_POST[nm_status_order]' WHERE id_status_order='$_GET[id_status_order]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=status_order';</script>";
}
?>
	