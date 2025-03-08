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
<h4 class="text-center mb-4">Daftar Riwayat <?php echo $_SESSION["pembeli"]["nm_pembeli"]?></h4>
<section class="konten">
	<div class="col-md-12">
	<table class="table">
	<thead class="thead-primary">
		<tr>
			<th><center>No</th>
			<th><center>Resi Faktur Beli</th>
			<th><center>Resi Faktur Rinci</th>
			<th><center>Tanggal </th>
			<th><center>Penjual</th>
			<th><center>Jasa Kirim</th>
			<th><center>Sistem Pengiriman</th>
			<th><center>Kategori</th>
			<th><center>Sub Harga</th>
			<th><center>Status Pengiriman</th>
			<th><center>Aksi</th>
		</tr>
	</thead>
	<tbody> 
		<?php $nomor=1;?>
		<?php
			//mendapatkan id pelanggan yg login dari session
			$id_customer = $_SESSION["pembeli"]["id_pembeli"];

			  $ambil = $koneksi->query("SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN status_pengiriman ON faktur_rinci.id_status_pengiriman=status_pengiriman.id_status_pengiriman JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman =daftar_pengiriman.id_daftar_pengiriman JOIN status_transfer_penjual ON faktur_rinci.id_status_transfer_penjual=status_transfer_penjual.id_status_transfer_penjual JOIN penjual ON faktur_rinci.id_penjual=penjual.id_penjual JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman JOIN kota ON daftar_pengiriman.id_kota_asal =kota.id_kota JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim  WHERE pembeli.id_pembeli='$id_customer'");
			while ($pecah = $ambil->fetch_assoc()) {
		?>		
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $pecah["id_faktur_beli"]; ?></td>
		<td><?php echo $pecah["id_faktur_rinci"]; ?></td>
		<td><?php echo date("d F Y",strtotime($pecah["tgl"])); ?></td>
		<td><?php echo $pecah["nm_pen"]; ?></td>
		<td><?php echo $pecah['nm_jasa_kirim']; ?></td>
		<td><?php echo $pecah['nm_sistem_pengiriman']; ?></td>
		<td><?php echo $pecah['nm_kategori']; ?></td>
		<td> Rp. <?php echo number_format($pecah['total_bayar']); ?></td>
		<td><?php echo $pecah['nm_status_pengiriman']; ?> </td>
		<td>
			<?php if (($pecah['id_status_pengiriman']!="STATPENG006")): ?>
			<a href="faktur_rinci_co.php?id=<?php echo $pecah["id_faktur_rinci"]; ?>" class="btn btn-info">Faktur</a><br>
			<?php endif ?> <br>
		<?php if (($pecah['id_status_pengiriman']=="STATPENG004")): ?>
			<a href="pesanan_diterima.php?id=<?php echo $pecah["id_faktur_rinci"]; ?>" class="btn btn-success">Pesanan di Terima</a>
			<a href="komplain.php?id=<?php echo $pecah["id_faktur_rinci"]; ?>" class="btn btn-warning">Komplain</a>
			<?php endif ?>
		<?php if (($pecah['id_status_pengiriman']=="STATPENG001") and ($pecah['rating']=="0")): ?>
			<a href="penilaian.php?id=<?php echo $pecah["id_faktur_rinci"]; ?>" class="btn btn-success">Rating</a>
			<?php endif ?>
		</td>

	</tr>
	<?php $nomor++; ?>
	<?php } ?>

</tbody></table></div>
</section><?php include('footer.php'); ?>
	</body>
</html>