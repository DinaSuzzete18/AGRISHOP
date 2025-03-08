<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH JENIS PEMBAYARAN
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM jenis_pembayaran WHERE id_jenis_pembayaran='$_GET[id_jenis_pembayaran]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Jenis Pembayaran </label>
		<input type="text" class="form-control" name="id_jenis_pembayaran" value="<?php echo $pecah['id_jenis_pembayaran'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jenis Pembayaran </label>
		<input type="text" class="form-control" name="nm_jenis_pembayaran" value="<?php echo $pecah['nm_jenis_pembayaran'];?>">
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
	$koneksi->query("UPDATE jenis_pembayaran SET id_jenis_pembayaran='$_POST[id_jenis_pembayaran]',
	nm_jenis_pembayaran='$_POST[nm_jenis_pembayaran]' WHERE id_jenis_pembayaran='$_GET[id_jenis_pembayaran]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=jenis_pembayaran';</script>";
}
?>
	