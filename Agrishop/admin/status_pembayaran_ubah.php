<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH STATUS PEMBAYARAN 
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM status_pembayaran WHERE id_status_pembayaran='$_GET[id_status_pembayaran]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Status Pembayaran </label>
		<input type="text" class="form-control" name="id_status_pembayaran" value="<?php echo $pecah['id_status_pembayaran'];?>">
	</div>
	<div class="form=group">
		<label>Nama Status Pembayaran </label>
		<input type="text" class="form-control" name="nm_stat_pembayaran" value="<?php echo $pecah['nm_stat_pembayaran'];?>">
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
	$koneksi->query("UPDATE status_pembayaran SET id_status_pembayaran='$_POST[id_status_pembayaran]',
	nm_stat_pembayaran='$_POST[nm_stat_pembayaran]' WHERE id_status_pembayaran='$_GET[id_status_pembayaran]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=status_pembayaran';</script>";
}
?>
	