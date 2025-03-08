<h2> Ubah Faktur Rinci </h2>
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM faktur_rinci WHERE id_faktur_rinci='$_GET[id_faktur_rinci]'");
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
		<label>Id Faktur Rinci </label>
		<input type="text" class="form-control" name="id_faktur_rinci" value="<?php echo $pecah['id_faktur_rinci'];?>">
	</div> <br/>

	<div class="form=group">
		<label>Tanggal Rinci </label>
		<input type="date" class="form-control" name="tgl_rinci" value="<?php echo $pecah['tgl_rinci'];?>">
	</div> <br/>

	<div class="form=group">
		<label>Transfer Uang Penjual</label>
		<input type="text" class="form-control" name="transfer_uang_penjual" value="<?php echo $pecah['transfer_uang_penjual'];?>">
	</div> <br/>

	<div class="form=group">
		<label> QTY Barang Per-Toko</label>
		<input type="text" class="form-control" name="qty_barang_per_toko" value="<?php echo $pecah['qty_barang_per_toko'];?>">
	</div> <br/>

	<div class="form=group">
		<label> Total Bayar </label>
		<input type="text" class="form-control" name="total_bayar" value="<?php echo $pecah['total_bayar'];?>">
	</div> <br/>

	<div class="form=group">
		<label> Id Status Pengiriman </label>
		<select class="form-control" name="id_status_pengiriman" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM status_pengiriman");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_status_pengiriman']?>"> <?php echo $pecah['id_status_pengiriman']?> --- <?php echo $pecah['nm_status_pengiriman']?></option>
		<?php } ?>
		</select>
	</div><br/>

	<div class="form=group">
		<label> Id Status Transfer Penjual </label>
		<select class="form-control" name="id_status_transfer_penjual" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM status_transfer_penjual");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_status_transfer_penjual']?>"> <?php echo $pecah['id_status_transfer_penjual']?> --- <?php echo $pecah['nm_status_transfer_penjual']?></option>
		<?php } ?>
		</select>
	</div><br/>

	<div class="form=group">
		<label> Id Penjual </label>
		<select class="form-control" name="id_penjual" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM penjual");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_penjual']?>"> <?php echo $pecah['id_penjual']?> --- <?php echo $pecah['nm_pen']?></option>
		<?php } ?>
		</select>
	</div><br/>

	<div class="form=group">
		<label> Id Daftar Pengiriman </label>
		<select class="form-control" name="id_daftar_pengiriman" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM daftar_pengiriman");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_daftar_pengiriman']?>"> <?php echo $pecah['id_daftar_pengiriman']?></option>
		<?php } ?>
		</select>
	</div><br/>

	<div class="form=group">
		<label> Id Faktur Beli </label>
		<select class="form-control" name="id_faktur_beli" required>
			<option value = "---">
		<?php $ambil1=$koneksi->query("SELECT * FROM faktur_beli");?>
		<?php while($pecah=$ambil1->fetch_assoc()){?>
		<option value="<?php echo $pecah['id_faktur_beli']?>"> <?php echo $pecah['id_faktur_beli']?></option>
		<?php } ?>
		</select>
	</div><br/>
	
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
</div> </div></div></div></div>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE faktur_rinci SET id_faktur_rinci='$_POST[id_faktur_rinci]', id_faktur_beli='$_POST[id_faktur_beli]',
		id_status_pengiriman='$_POST[id_status_pengiriman]',
	 tgl_rinci='$_POST[tgl_rinci]', 
	 id_daftar_pengiriman='$_POST[id_daftar_pengiriman]', 
	 id_status_transfer_penjual='$_POST[id_status_transfer_penjual]',
	  id_penjual='$_POST[id_penjual]', 
	  transfer_uang_penjual='$_POST[transfer_uang_penjual]', qty_barang_per_toko='$_POST[qty_barang_per_toko]', total_bayar='$_POST[total_bayar]'
	 WHERE id_faktur_rinci='$_GET[id_faktur_rinci]'");
	
	echo "<script> alert('Data Berhasil di Ubah');</script>";
	echo "<script>location='index.php?halaman=faktur_rinci';</script>";
}
?>