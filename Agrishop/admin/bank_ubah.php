<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH BANK
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM bank WHERE id_bank='$_GET[id_bank]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Bank </label>
		<input type="text" class="form-control" name="id_bank" value="<?php echo $pecah['id_bank'];?>">
	</div>
	<div class="form=group">
		<label>Nama Bank </label>
		<input type="text" class="form-control" name="nm_bank" value="<?php echo $pecah['nm_bank'];?>">
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
	$koneksi->query("UPDATE bank SET id_bank='$_POST[id_bank]',
	nm_bank='$_POST[nm_bank]' WHERE id_bank='$_GET[id_bank]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=bank';</script>";
}
?>
	