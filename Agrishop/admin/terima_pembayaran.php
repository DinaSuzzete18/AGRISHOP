<?php
session_start();
require_once("koneksi.php");
echo "<script>alert('Ubah Status Menjadi (Sudah Bayar)?')</script>";
$id_faktur_beli = isset($_GET['id_faktur_beli']) ? $_GET['id_faktur_beli'] : '';
$sql = "SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran";
$hasil=mysqli_query($koneksi, $sql);
if (mysqli_num_rows($hasil) > 0) 
{
	while ($data=mysqli_fetch_array($hasil))
	{
		$sql=$koneksi->query("UPDATE faktur_beli SET id_status_pembayaran='STAPEM003' WHERE id_faktur_beli='$id_faktur_beli'");
		$sql=$koneksi->query("UPDATE faktur_rinci SET id_status_pengiriman='STATPENG003' WHERE faktur_rinci.id_faktur_beli='$id_faktur_beli'");
		echo "<script>alert('Status Pembayaran Diubah');location='index.php?halaman=faktur_beli';</script>";
	}
}
else
{
	echo "<script>alert('Proses gagal'); location='index2.php?halaman=faktur_beli';</script>";
}
?>