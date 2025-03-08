<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH STATUS PEMBAYARAN
            </div>
            <div class="card-body">

<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Status Pembayaran </label>
		<input type="text" class="form-control" name="id_status_pembayaran">
	</div>
	<div class="form-group">
		<label> Nama Status Pembayaran </label>
		<input type="text" class="form-control" name="nm_stat_pembayaran">
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
	$koneksi->query("INSERT INTO status_pembayaran (id_status_pembayaran,nm_stat_pembayaran) 
	VALUES ('$_POST[id_status_pembayaran]','$_POST[nm_stat_pembayaran]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=status_pembayaran'>";
}
?>
	