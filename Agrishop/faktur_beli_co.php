<?php
session_start();
if(!isset($_SESSION["pembeli"]['id_kota_pembeli']))
{
	
}
include('koneksi.php');

if(!isset($_SESSION["keranjang"]))
{
	
}
if(!isset($_GET["no"]))
{
	
}
else
{
	$nol=$_GET["no"];
	$_SESSION["ongkir"][$nol]=$_GET["tarif_pengiriman"];
	echo $_SESSION["ongkir"][$nol];
	
}
?>
<?php include 'header.php' ?>
<section class="konten">
	<div class="container">
	<br>
<h2 class="text-success"><center> Detail Faktur Beli</center></h2>

<?php
$ambil=$koneksi->query("SELECT * FROM faktur_beli JOIN pembeli on faktur_beli.id_pembeli=pembeli.id_pembeli join kota on pembeli.id_kota_tujuan=kota.id_kota
 WHERE faktur_beli.id_faktur_beli='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>

<?php 
	//mendapatkan id pelanggan yg beli
	$id_beli = $detail["id_pembeli"];

	//mendapatkan id yg login
	$id_login = $_SESSION["pembeli"]["id_pembeli"];

	if ($id_beli!==$id_login) 
	{
		echo "<script>alert('Maaf, anda tidak dapat mengakses data orang lain');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
	}
?>

<p>

<?php
$ambilll=$koneksi->query("SELECT * FROM faktur_beli JOIN jasa_pembayaran on faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran WHERE faktur_beli.id_faktur_beli='$_GET[id]' ");
$detailll=$ambilll->fetch_assoc();
?>
<?php
$ambilllll= $koneksi->query("SELECT * FROM faktur_beli JOIN status_pembayaran on faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran
						   WHERE faktur_beli.id_faktur_beli='$_GET[id]'");
$detailllll = $ambilllll->fetch_assoc();
?>
<?php 
$ambill= $koneksi->query("SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN status_pengiriman ON faktur_rinci.id_status_pengiriman=status_pengiriman.id_status_pengiriman JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman =daftar_pengiriman.id_daftar_pengiriman JOIN status_transfer_penjual ON faktur_rinci.id_status_transfer_penjual=status_transfer_penjual.id_status_transfer_penjual JOIN penjual ON faktur_rinci.id_penjual=penjual.id_penjual
						WHERE faktur_rinci.id_faktur_beli='$_GET[id]'");
					
$detaill = $ambill->fetch_assoc();
?>
<?php
$ambillll= $koneksi->query("SELECT * FROM faktur_rinci JOIN status_pengiriman on faktur_rinci.id_status_pengiriman= status_pengiriman.id_status_pengiriman
						   WHERE faktur_rinci.id_faktur_rinci='$_GET[id]'");
$detaillll = $ambillll->fetch_assoc();
?>

<?php 
 $ambily=$koneksi->query("SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman =daftar_pengiriman.id_daftar_pengiriman JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman JOIN kota ON daftar_pengiriman.id_kota_asal =kota.id_kota JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim WHERE faktur_rinci.id_faktur_beli='$_GET[id]'");
$detaily = $ambily->fetch_assoc();
 ?>

<div class="row">
	<div class="col-md-6">
	<h3><strong>Pembelian</strong></h3>
<h5>  
ID Faktur 			: <?php echo $detailll['id_faktur_beli']; ?> <br>
Tanggal    			: <?php echo date("d F Y",strtotime($detailll['tgl'])); ?> <br>
Total Harga 		: Rp. <?php echo number_format($detailll['tot_bayar']); ?><br>
Jasa Pembayaran 	: <?php echo $detailll['nm_jasa_pembayaran'];?> <br> </h6>
	</div>
	<div class="col-md-6">
		<h3><strong>Pembeli</strong></h3>
	<h5>  
	Nama 			: <?php echo $detail['nm_pembeli']; ?> <br>
	Alamat Lengkap	: <?php echo $detail['almt_pembeli'];?> <br>
	No HP 			: <?php echo $detail['no_hp_pembeli'];?> <br>
	Kota Pembeli	: <?php echo $detail['nm_kota'];?> <br>	 </h5>
</div>
</P>
<table class="table">
		<thead class="thead-primary">
		<tr>
			<th> No</th>
			<th> Penjual </th>
			<th> Barang </th>
			<th> Harga </th>
			<th> QTY </th>
			<th> Sub Harga</th> 
			<th> Jasa Kirim</th>
			<th> Jenis Pengiriman</th>
		</tr>
		</thead>
	<tbody>
	<?php $nomor=1;?>
	<?php $totalbelanja=0;?>
	<?php $totalongkir=0; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.id_barang=barang.id_barang 
		join faktur_rinci on transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci join penjual on barang.id_penjual=penjual.id_penjual JOIN faktur_beli ON faktur_rinci.id_faktur_beli = faktur_beli.id_faktur_beli JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman=daftar_pengiriman.id_daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim
		WHERE faktur_beli.id_faktur_beli='$_GET[id]' "); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['nm_pen']; ?></td>
			<td><?php echo $pecah['nm_barang']; ?></td>
			<td><?php echo number_format ($pecah['harga']); ?></td>
			<td><?php echo $pecah['qty_barang']; ?></td>
			<td><?php echo number_format ($pecah['harga']*$pecah['qty_barang']);?></td>	
			<td><?php echo $pecah['nm_jasa_kirim'];?></td>
			<td><?php echo $pecah['nm_sistem_pengiriman'];?></td>
		</tr>
		<?php $nomor++; ?>
		<?php $totalongkir += $pecah['tarif_pengiriman'];  ?>
		<?php $totalbelanja+=($pecah['harga']*$pecah['qty_barang']); ?>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="7"> Total Belanja </th>
			<th>Rp. <?php echo number_format ($totalbelanja) ?>
		</tr>
		<tr>	
			<th colspan="7"> Total Biaya Pengiriman</th>
			<th>Rp. <?php echo number_format ($totalongkir); ?>
		</tr>
		<tr>
			<th colspan="7"> Total Bayar</th>
			<th>Rp. <?php echo number_format ($totalongkir + $totalbelanja ); ?>
		</tr>
</table>
<?php if (empty($detail["info"])): ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-info">
						<p>Silahkan melakukan pembayaran <strong>Rp. <?php echo number_format($totalongkir + $totalbelanja); ?></strong> ke</p>
						<strong><?php echo $detailll['nm_jasa_pembayaran']; ?> : <?php echo $detaily['no_pembayaran']; ?> </strong></p>
					</div>
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
	</div>
	<center><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='pembayaran.php'" data-toggle="tooltip" data-placement="top" title="Selanjutnya">
          Selanjutnya
          </button></center>
</section>
</body>
</html>
<?php include('footer.php'); ?>