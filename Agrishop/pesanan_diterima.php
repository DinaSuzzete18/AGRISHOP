<?php
session_start();
require_once("koneksi.php");
//echo "<script>alert('Ubah Status Menjadi (Sudah Bayar)?')</script>";
$id_faktur_rinci = isset($_GET['id']) ? $_GET['id'] : '';
$ambil=$koneksi->query("SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN status_pengiriman ON faktur_rinci.id_status_pengiriman=status_pengiriman.id_status_pengiriman JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman =daftar_pengiriman.id_daftar_pengiriman JOIN status_transfer_penjual ON faktur_rinci.id_status_transfer_penjual=status_transfer_penjual.id_status_transfer_penjual JOIN penjual ON faktur_rinci.id_penjual=penjual.id_penjual");
$pecah=$ambil->fetch_assoc();
$sql = "SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli=faktur_beli.id_faktur_beli JOIN status_pengiriman ON faktur_rinci.id_status_pengiriman=status_pengiriman.id_status_pengiriman JOIN daftar_pengiriman ON faktur_rinci.id_daftar_pengiriman =daftar_pengiriman.id_daftar_pengiriman JOIN status_transfer_penjual ON faktur_rinci.id_status_transfer_penjual=status_transfer_penjual.id_status_transfer_penjual JOIN penjual ON faktur_rinci.id_penjual=penjual.id_penjual";
$hasil=mysqli_query($koneksi, $sql);
if (mysqli_num_rows($hasil) > 0) 
{
	while ($data=mysqli_fetch_array($hasil))
	{
		$sql=$koneksi->query("UPDATE faktur_rinci SET id_status_pengiriman='STATPENG001', id_status_transfer_penjual='018C1', transfer_uang_penjual='$pecah[total_bayar]' WHERE id_faktur_rinci='$id_faktur_rinci'");
		echo "<script>alert('Barang/Produk Sudah di Terima');location='riwayat.php';</script>";
	}
}
else
{
	//echo "<script>alert('Proses gagal'); location='index2.php?halaman=nota2';</script>";
}
?>