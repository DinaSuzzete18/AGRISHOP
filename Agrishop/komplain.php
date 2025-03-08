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
						WHERE faktur_rinci.id_faktur_rinci='$_GET[id]'");
					
$detaill = $ambill->fetch_assoc();
?>
<?php include 'header.php' ?>
    <!-- END nav -->
	<hr class="sidebar-divider">
	<div class="container" >
		<b><h2>Komplain</h2></b>
		<b><p>Kirim bukti Komplain anda disini!</p></b>
		
		</div>
		
		<form method="post" enctype="multipart/form-data">
		<div class="container" >
		<div class='row'>
			<div class="form-group">
				<label>Nama Pembeli</label>
				<input type="text" name="nama" class="form-control" readonly value ="<?php echo $_SESSION["pembeli"]["nm_pembeli"] ?>">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" name="bukti" class="form-control" required>
			</div>
			<div class="form-group"><br>
					<label>Penilaian Anda</label>
					<textarea class="form-control" name="nilai" placeholder="Berikan Penilaian Anda" rows="3" required></textarea>
			</div>
		</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</div>
			
		</form>
		

	</div>

	<?php 
		if(isset($_POST["kirim"]))
		{
			$nilai =$_POST["nilai"];
			$namabukti=$_FILES["bukti"]["name"];
			$lokasibukti=$_FILES["bukti"]["tmp_name"];
			move_uploaded_file($lokasibukti, "photo/$namabukti");
			$tanggal = date("Y-m-d");

			$koneksi->query("UPDATE faktur_rinci SET komplain='$namabukti', id_status_pengiriman='STATPENG007', transfer_uang_penjual='$detaill[total_bayar]', id_status_transfer_penjual='018C1', rating='1', penilaian='$nilai' WHERE id_faktur_rinci='$idpem'");
			
			//$koneksi->query("UPDATE faktur_rinci SET kode_SK='SP01' WHERE faktur_rinci.kode_faktur='$idpem'");
			echo "<script>alert('Terimakasih Sudah Melakukan Komplain ');</script>";
			echo "<script>location='riwayat.php';</script>";
		}
	?>

</body>
</html>