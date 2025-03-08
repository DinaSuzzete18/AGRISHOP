<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH STATUS TRANSFER PENJUAL
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM status_transfer_penjual WHERE id_status_transfer_penjual='$_GET[id_status_transfer_penjual]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Status Transfer Penjual </label>
		<input type="text" class="form-control" name="id_status_transfer_penjual" value="<?php echo $pecah['id_status_transfer_penjual'];?>">
	</div>
	<div class="form=group">
		<label>Nama Status Transfer Penjual </label>
		<input type="text" class="form-control" name="nm_status_transfer_penjual" value="<?php echo $pecah['nm_status_transfer_penjual'];?>">
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
	$koneksi->query("UPDATE status_transfer_penjual SET id_status_transfer_penjual='$_POST[id_status_transfer_penjual]',
	nm_status_transfer_penjual='$_POST[nm_status_transfer_penjual]' WHERE id_status_transfer_penjual='$_GET[id_status_transfer_penjual]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=status_transfer_penjual';</script>";
}
?>
	