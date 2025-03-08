<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JASA KIRIM
            </div>
            <div class="card-body">

<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Jasa Kirim </label>
		<input type="text" class="form-control" name="id_jasa_kirim">
	</div>
	<div class="form-group">
		<label> Nama Jasa Kirim </label>
		<input type="text" class="form-control" name="nm_jasa_kirim">
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
	$koneksi->query("INSERT INTO jasa_kirim (id_jasa_kirim, nm_jasa_kirim) 
	VALUES ('$_POST[id_jasa_kirim]','$_POST[nm_jasa_kirim]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jasa_kirim'>";
}
?>
	