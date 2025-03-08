<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH DAFTAR BANK
            </div>
            <div class="card-body">

			<form method = "post" enctype ="multipart/form-data">
				<div class="form-group">
					<label color="black"> Id Bank </label>
					<input type="text" class="form-control" name="id_bank">
				</div>
				<div class="form-group" >
					<label> Nama Bank </label>
					<input type="text" class="form-control" name="nm_bank">
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
	$koneksi->query("INSERT INTO bank (id_bank, nm_bank) 
	VALUES ('$_POST[id_bank]','$_POST[nm_bank]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=bank'>";
}
?>
	