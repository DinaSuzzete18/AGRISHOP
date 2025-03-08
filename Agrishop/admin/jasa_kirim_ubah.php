<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH JASA KIRIM
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM jasa_kirim WHERE id_jasa_kirim='$_GET[id_jasa_kirim]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Jasa Kirim </label>
		<input type="text" class="form-control" name="id_jasa_kirim" value="<?php echo $pecah['id_jasa_kirim'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jasa Kirim </label>
		<input type="text" class="form-control" name="nm_jasa_kirim" value="<?php echo $pecah['nm_jasa_kirim'];?>">
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
	$koneksi->query("UPDATE jasa_kirim SET id_jasa_kirim='$_POST[id_jasa_kirim]',
	nm_jasa_kirim='$_POST[nm_jasa_kirim]' WHERE id_jasa_kirim='$_GET[id_jasa_kirim]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=jasa_kirim';</script>";
}
?>
	