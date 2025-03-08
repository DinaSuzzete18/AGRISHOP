<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH STATUS TRANSFER PENJUAL
            </div>
            <div class="card-body">

<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Status Transfer Penjual </label>
		<input type="text" class="form-control" name="id_status_transfer_penjual">
	</div>
	<div class="form-group">
		<label> Nama Status Transfer Penjual </label>
		<input type="text" class="form-control" name="nm_status_transfer_penjual">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
</div>
</div>
</div>
</div>
</div>

<?php
if (isset($_POST['save']))
{
	$koneksi->query("INSERT INTO status_transfer_penjual (id_status_transfer_penjual,nm_status_transfer_penjual) 
	VALUES ('$_POST[id_status_transfer_penjual]','$_POST[nm_status_transfer_penjual]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=status_transfer_penjual'>";
}
?>
	