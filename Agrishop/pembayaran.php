<?php
session_start ();
include 'koneksi.php';
//echo "<pre>";
//echo  print_r($_SESSION);
//echo "</pre>";
if(!isset($_SESSION["pembeli"]))
{
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
}

?>
<?php include 'header.php' ?>	
<h4 class="text-center mb-4">Pembayaran <?php echo $_SESSION["pembeli"]["nm_pembeli"]?></h4>
<section class="konten">
	<div class="col-md-12">
	<table class="table">
	<thead class="thead-primary">
		<tr>
			<th><center>No</th>
			<th><center>Kode Faktur Beli</th>
			<th><center>Tanggal Faktur Beli</th>
			<th><center>Status Pembayaran</th>
			<th><center>Metode Pembayaran</th>
			<th><center>Jasa Pembayaran</th>
			<th><center>No Pembayaran</th>
			<th><center>Rekening Pembayaran</th>
			<th><center>Total</th>
			<th><center>Aksi</th>
		</tr>
	</thead>
	<tbody> 
		<?php $nomor=1;?>
		<?php
			//mendapatkan id pelanggan yg login dari session
			$id_customer = $_SESSION["pembeli"]["id_pembeli"];

			  $ambil = $koneksi->query("SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran JOIN  jenis_pembayaran ON jasa_pembayaran.id_jenis_pembayaran=jenis_pembayaran.id_jenis_pembayaran JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran WHERE pembeli.id_pembeli='$id_customer'");
			while ($pecah = $ambil->fetch_assoc()) {
		?>		
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $pecah["id_faktur_beli"]; ?></td>
		<td><?php echo date("d F Y",strtotime($pecah["tgl"])); ?></td>
		<td><?php echo $pecah["nm_stat_pembayaran"]; ?></td>
		<td><?php echo $pecah['nm_jenis_pembayaran']; ?></td>
		<td><?php echo $pecah['nm_jasa_pembayaran']; ?></td>
		<td><?php echo $pecah['no_pembayaran']; ?></td>
		<td><?php echo $pecah['no_rekening']; ?></td>
		<td>Rp. <?php echo number_format($pecah['tot_bayar']); ?> </td>
		<td>
			<?php if($pecah['id_status_pembayaran']!="STAPEM001"): ?>
			<a href="faktur_beli_co.php?id=<?php echo $pecah["id_faktur_beli"]; ?>" class="btn btn-info">Faktur</a>
			<?php endif; ?>

			<?php if ($pecah['id_status_pembayaran']=="STAPEM002"): ?>
				<a href="input_pembayaran.php?id=<?php echo $pecah["id_faktur_beli"]; ?>" class="btn btn-success">Input Pembayaran</a>
				<a href="batalkan_pesanan.php?id=<?php echo $pecah["id_faktur_beli"]; ?>" class="btn-danger btn">Batalkan Pesanan</a>
			<?php elseif(($pecah['nm_stat_pembayaran']=="Sedang di Verifikasi" OR $pecah['nm_stat_pembayaran']=="Sudah Bayar" )): ?>
			<a href="lihat_pembayaran.php?id_faktur_beli=<?php echo $pecah["id_faktur_beli"]; ?>" class="btn btn-primary">Lihat Pembayaran</a>
			<?php endif ?>

		</td>

	</tr>
	<?php $nomor++; ?>
	<?php } ?>

</tbody></table></div>
</section><?php include('footer.php'); ?>
	</body>
</html>