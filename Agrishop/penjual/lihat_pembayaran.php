<?php
include 'koneksi.php';
?>

<?php
$id_nota=$_GET['id_faktur_beli']; 
$ambil=$koneksi->query("SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran 
						WHERE faktur_beli.id_faktur_beli='$id_nota'") ;
$pecah=$ambil->fetch_assoc();
$dulu=$pecah['id_faktur_beli'];
?>
	<section class="container py-1">
        <div class="row text-center pt-6">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><strong> Bukti Pembayaran </h1></strong>
				<br><br>
            </div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<br><br>
			<table class="table">
				<tr>
					<th> Nama </th>
					<td><?php echo $pecah['nm_pembeli'] ?></td>
				</tr>
				<tr>
					<th> Jenis Pembayaran </th>
					<td><?php echo $pecah['nm_jasa_pembayaran'] ?> </td>
				</tr>
				<tr>
					<th> Tanggal </th>
					<td> <?php echo $pecah['tgl'] ?></td>
				</tr>
				<tr>
					<th> Jumlah Pembayaran </th>
					<td> Rp <?php echo number_format($pecah['tot_bayar']) ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
		<img src="../penjual/photo/<?php echo $pecah['bukti_pembayaran']; ?>" width="250" height="250" class="img-responsif">
		</div>
		</div>
<form class="form-horizontal" method="GET" action="editlihatpembayaran3.php" >
	<table>
	<input type="hidden" name="dulu" value="<?php echo $dulu; ?>">
		<tr>
			<td>Pembayaran</td>
		</tr>
		<tr>
			
			<td><a href="terima_pembayaran.php?id_faktur_beli=<?php echo $pecah['id_faktur_beli']?>" class="btn btn-success glyphicon glyphicon-save">Pembayaran Diterima</a></td>
			<td><a href="tolak_pembayaran.php?id_faktur_beli=<?php echo $pecah['id_faktur_beli']?>" class="btn btn-success glyphicon glyphicon-save">Ditolak</a></td>
		</tr>
	</table>
</form>
			

	</section>
	<br><br><br>



</body>
</html>
