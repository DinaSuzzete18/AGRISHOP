<h2> Ubah Diskon </h2><div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH DISKON
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM diskon WHERE id_diskon='$_GET[id_diskon]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Diskon </label>
		<input type="text" class="form-control" name="id_diskon" value="<?php echo $pecah['id_diskon'];?>">
	</div>
	<div class="form=group">
		<label>Nama Diskon </label>
		<input type="text" class="form-control" name="nm_diskon" value="<?php echo $pecah['nm_diskon'];?>">
	</div>
	<div class="form=group">
		<label>Harga Diskon </label>
		<input type="text" class="form-control" name="hrg_diskon" value="<?php echo $pecah['hrg_diskon'];?>">
	</div>
	<div class="form-group">
		<label> Tanggal Muncul Diskon </label>
		<input type="date" class="form-control" name="tgl_muncul">
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
	$koneksi->query("UPDATE diskon SET id_diskon='$_POST[id_diskon]',
	nm_diskon='$_POST[nm_diskon]', hrg_diskon='$_POST[hrg_diskon]', tgl_muncul='$_POST[tgl_muncul]'
	  WHERE id_diskon='$_GET[id_diskon]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=diskon';</script>";
}
?>
	