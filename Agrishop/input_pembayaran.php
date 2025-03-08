<?php
	session_start();
	include 'koneksi.php';

if(!isset($_SESSION["pembeli"]))
{
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
}
?>

<?php
$idpem = $_GET["id"];
$ambil=$koneksi->query("SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran WHERE faktur_beli.id_faktur_beli='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
$ambill= $koneksi->query("SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN status_pengiriman ON faktur_rinci.id_status_pengiriman=status_pengiriman.id_status_pengiriman JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman =daftar_pengiriman.id_daftar_pengiriman JOIN status_transfer_penjual ON faktur_rinci.id_status_transfer_penjual=status_transfer_penjual.id_status_transfer_penjual JOIN penjual ON faktur_rinci.id_penjual=penjual.id_penjual
						WHERE faktur_rinci.id_faktur_beli='$_GET[id]'");
					
$detaill = $ambill->fetch_assoc();
?>
<!--/. <pre><?php print_r($detail) ?></pre> -->

<!-- if pembeli != yg login THEN dilarikan ke riwayat.php -->
<!-- pembeli harus yg login -->
<?php 
	//mendapatkan id pelanggan yg beli
	$id_beli = $detail["id_pembeli"];

	//mendapatkan id yg login
	$id_login = $_SESSION["pembeli"]["id_pembeli"];

	if ($id_beli!==$id_login) 
	{
		echo "<script>alert('Maaf, anda tidak dapat mengakses data orang lain');</script>";
		echo "<script>location='riwayat.php'</script>";
		exit();
	}
?>
<?php include 'header.php' ?>
    <!-- END nav -->
	<hr class="sidebar-divider">
	<div class="container" >
		<b><h2>Konfirmasi Pembayaran</h2></b>
		<b><p>Kirim bukti pembayaran anda disini!</p></b>
		<div class="alert alert-info">Total tagihan Anda :<strong> Rp. <?php echo number_format($detail["tot_bayar"]) ?></strong>
			<?php if (empty($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
						<p>Silahkan melakukan pembayaran Ke </br>
						<strong><?php echo $detail['nm_jasa_pembayaran']; ?> : 
						<br> No Pembayaran : 
						 <?php echo $detail['no_pembayaran']; ?> <br>
						AGRISHOP </strong></p>
				</div>
			</div>
	<?php elseif (isset($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<?php echo $detail['info']; ?>
					</div>
				</div>
			</div>
	<?php endif ?>
		
		</div>
		
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Pembeli</label>
				<input type="text" name="nama" class="form-control" readonly value ="<?php echo $_SESSION["pembeli"]["nm_pembeli"] ?>">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" name="bukti" class="form-control" required>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
		

	</div>

	<?php 
		if(isset($_POST["kirim"]))
		{
			$namabukti=$_FILES["bukti"]["name"];
			$lokasibukti=$_FILES["bukti"]["tmp_name"];
			move_uploaded_file($lokasibukti, "photo/$namabukti");
			$tanggal = date("Y-m-d");

			$koneksi->query("UPDATE faktur_beli SET bukti_pembayaran='$namabukti', tgl='$tanggal', id_status_pembayaran='STAPEM004' WHERE id_faktur_beli='$idpem'");
			
			//$koneksi->query("UPDATE faktur_rinci SET kode_SK='SP01' WHERE faktur_rinci.kode_faktur='$idpem'");
			echo "<script>alert('Terimakasih sudah melakukan pembayaran ');</script>";
			echo "<script>location='pembayaran.php';</script>";
		}
	?>

</body>
</html>