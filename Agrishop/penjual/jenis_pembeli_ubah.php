<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH JENIS PEMBELI
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM jenis_pembeli WHERE id_jenis_pembeli='$_GET[id_jenis_pembeli]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Jenis Pembeli </label>
		<input type="text" class="form-control" name="id_jenis_pembeli" value="<?php echo $pecah['id_jenis_pembeli'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jenis Pembeli </label>
		<input type="text" class="form-control" name="nm_jenis_pembeli" value="<?php echo $pecah['nm_jenis_pembeli'];?>">
	</div>
	<div class="form=group">
		<label>Jumlah Potongan  </label>
		<input type="text" class="form-control" name="jumlah_potongan" value="<?php echo number_format($pecah['jumlah_potongan']);?>">
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
	$koneksi->query("UPDATE jenis_pembeli SET id_jenis_pembeli='$_POST[id_jenis_pembeli]',
	nm_jenis_pembeli='$_POST[nm_jenis_pembeli]', jumlah_potongan='$_POST[jumlah_potongan]' WHERE id_jenis_pembeli='$_GET[id_jenis_pembeli]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=jenis_pembeli';</script>";
}
?>
	