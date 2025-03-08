<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH STATUS PENGIRIMAN
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM status_pengiriman WHERE id_status_pengiriman='$_GET[id_status_pengiriman]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Status Pengiriman </label>
		<input type="text" class="form-control" name="id_status_pengiriman" value="<?php echo $pecah['id_status_pengiriman'];?>">
	</div>
	<div class="form=group">
		<label>Nama Status Pengiriman </label>
		<input type="text" class="form-control" name="nm_status_pengiriman" value="<?php echo $pecah['nm_status_pengiriman'];?>">
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
	$koneksi->query("UPDATE status_pengiriman SET id_status_pengiriman='$_POST[id_status_pengiriman]',
	nm_status_pengiriman='$_POST[nm_status_pengiriman]' WHERE id_status_pengiriman='$_GET[id_status_pengiriman]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=status_pengiriman';</script>";
}
?>
	