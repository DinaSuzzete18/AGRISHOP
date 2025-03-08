<h2> Ubah Faktur Rinci </h2>
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM faktur_beli WHERE id_faktur_beli='$_GET[id_faktur_beli]'");
$pecah=$ambil->fetch_assoc ();

?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH FAKTUR BELI
            </div>
            <div class="card-body">
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Faktur Beli </label>
		<input type="text" class="form-control" name="id_faktur_beli" value="<?php echo $pecah['id_faktur_beli'];?>">
	</div> <br/>

	<div class="form=group">
		<label>Total Bayar </label>
		<input type="text" class="form-control" name="tot_bayar" value="<?php echo $pecah['tot_bayar'];?>">
	</div> <br/>

	<div class="form=group">
		<label>Total Barang </label>
		<input type="text" class="form-control" name="tot_barang" value="<?php echo $pecah['tot_barang'];?>">
	</div> <br/>

	<div class="form=group">
		<label> QTY </label>
		<input type="text" class="form-control" name="qty" value="<?php echo $pecah['qty'];?>">
	</div> <br/>

	<div class="form=group">
		<label> No Pembayaran </label>
		<input type="text" class="form-control" name="no_pembayaran" value="<?php echo $pecah['no_pembayaran'];?>">
	</div> <br/>

	<div class="form=group">
		<label> No Rekening Pembeli </label>
		<input type="text" class="form-control" name="no_rekening" value="<?php echo $pecah['no_rekening'];?>">
	</div> <br/>

	<div class="form=group">
		<label>Tanggal Pembayaran </label>
		<input type="date" class="form-control" name="tgl" value="<?php echo $pecah['tgl'];?>">
	</div><br/>

	<div class="form=group">
		<label> Id Jasa Pembayaran </label>
		<select class="form-control" name="id_jasa_pembayaran" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM jasa_pembayaran");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_jasa_pembayaran']?>"> <?php echo $pecah['id_jasa_pembayaran']?> --- <?php echo $pecah['nm_jasa_pembayaran']?></option>
		<?php } ?>
		</select>
	</div><br/>

	<div class="form=group">
		<label> Id Diskon </label>
		<select class="form-control" name="id_diskon" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM diskon");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_diskon']?>"> <?php echo $pecah['id_diskon']?> --- <?php echo $pecah['nm_diskon']?></option>
		<?php } ?>
		</select>
	</div><br/>

	<div class="form=group">
		<label> Id Pembeli </label>
		<select class="form-control" name="id_pembeli" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM pembeli");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_pembeli']?>"> <?php echo $pecah['id_pembeli']?> --- <?php echo $pecah['nm_pembeli']?></option>
		<?php } ?>
		</select>
	</div><br/>

	<div class="form=group">
		<label> Id Status Pembayaran </label>
		<select class="form-control" name="id_status_pembayaran" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM status_pembayaran");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_status_pembayaran']?>"> <?php echo $pecah['id_status_pembayaran']?> --- <?php echo $pecah['nm_stat_pembayaran']?></option>
		<?php } ?>
		</select>
	</div><br/>

	
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
</div> </div></div></div></div>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE faktur_beli SET id_faktur_beli='$_POST[id_faktur_beli]', id_jasa_pembayaran='$_POST[id_jasa_pembayaran]', id_diskon='$_POST[id_diskon]', id_pembeli='$_POST[id_pembeli]', id_status_pembayaran='$_POST[id_status_pembayaran]', tot_barang='$_POST[tot_barang]', tot_bayar='$_POST[tot_bayar]', qty='$_POST[qty]', tgl='$_POST[tgl]', no_pembayaran='$_POST[no_pembayaran]', no_rekening='$_POST[no_rekening]'
	 WHERE id_faktur_beli='$_GET[id_faktur_beli]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=faktur_beli';</script>";
}
?>