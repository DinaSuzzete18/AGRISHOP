<?php
session_start();
require_once("koneksi.php");
echo "<script>alert('Ubah Status Menjadi (Ditolak)?')</script>";
$kode_faktur = isset($_GET['id_faktur_beli']) ? $_GET['id_faktur_beli'] : '';
$sql = "SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran";

$hasil=mysqli_query($koneksi, $sql);
if (mysqli_num_rows($hasil) > 0) 
{
	while ($data=mysqli_fetch_array($hasil))
	{
		$sql=$koneksi->query("UPDATE faktur_beli SET id_status_pembayaran='STAPEM001' WHERE id_faktur_beli='$kode_faktur'");
		$sql=$koneksi->query("UPDATE faktur_rinci SET id_status_pengiriman='STATPENG006', id_status_transfer_penjual='018C3' WHERE faktur_rinci.id_faktur_beli='$kode_faktur'");
		echo "<script>alert('Status Pembayaran Ditolak');location='index.php?halaman=faktur_beli';</script>";
	}
}
else
{
	echo "<script>alert('Proses gagal');  location='index.php?halaman=faktur_beli';</script>";
}
?>