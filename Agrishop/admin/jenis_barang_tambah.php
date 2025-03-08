<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JENIS BARANG 
            </div>
            <div class="card-body">

<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Jenis Barang </label>
		<input type="text" class="form-control" name="id_jenis">
	</div>
	<div class="form-group">
		<label> Nama Jenis Barang </label>
		<input type="text" class="form-control" name="nm_jns_brg">
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
	$koneksi->query("INSERT INTO jenis_barang (id_jenis, nm_jns_brg) 
	VALUES ('$_POST[id_jenis]','$_POST[nm_jns_brg]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenis_barang'>";
}
?>
	