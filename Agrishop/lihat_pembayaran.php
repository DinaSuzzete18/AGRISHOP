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

<?php
$id_nota=$_GET['id_faktur_beli']; 
$ambil=$koneksi->query("SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli JOIN jasa_pembayaran ON faktur_beli.id_jasa_pembayaran=jasa_pembayaran.id_jasa_pembayaran JOIN status_pembayaran ON faktur_beli.id_status_pembayaran=status_pembayaran.id_status_pembayaran JOIN diskon on faktur_beli.id_diskon=diskon.id_diskon 
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
			<div class="col-md-3">
			<img src="penjual/photo/<?php echo $pecah['bukti_pembayaran']; ?>" width="250" height="250" class="img-responsif">
		</div>
		<div class="col-md-3">
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
		</div>
<form class="form-horizontal" method="GET" action="editlihatpembayaran3.php" >
	<center><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='pembayaran.php'" data-toggle="tooltip" data-placement="top" title="Selanjutnya">
          Back
          </button></center>
</form>
			

	</section>
	<br><br><br>



</body>
</html>
