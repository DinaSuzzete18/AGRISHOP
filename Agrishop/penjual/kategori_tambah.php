<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH KATEGORI
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Kategori </label>
		<input type="text" class="form-control" name="id_kategori">
	</div>
	<div class="form-group">
		<label> Nama Kategori </label>
		<input type="text" class="form-control" name="nm_kategori">
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
	$koneksi->query("INSERT INTO kategori (id_kategori, nm_kategori) 
	VALUES ('$_POST[id_kategori]','$_POST[nm_kategori]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}
?>
	