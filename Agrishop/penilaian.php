<?php
	session_start ();
	include 'koneksi.php';

	if(!isset($_SESSION["pembeli"]))
	{
		echo "<script>alert('Silahkan Login');</script>";
		echo "<script>location='login.php';</script>";
	}

	//mendapatkan kode faktur dari url
	$id_rinci = $_GET["id"];
	$ambil = $koneksi->query("SELECT * FROM faktur_rinci JOIN faktur_beli ON faktur_rinci.id_faktur_beli = faktur_beli.id_faktur_beli JOIN pembeli ON faktur_beli.id_pembeli=pembeli.id_pembeli WHERE id_faktur_rinci='$id_rinci'");
	$detpem = $ambil->fetch_assoc();

	//medapatkan id pembeli
	$id_cus = $detpem["id_pembeli"];
	//mendapatka id yg login
	$id_log = $_SESSION["pembeli"]["id_pembeli"];

	if ($id_log !== $id_cus) 
	{
		echo "<script>alert('Anda tidak diizinkan melihat data orang lain');</script>";
		echo "<script>location='riwayat.php';</script>";
	}

	$status=""
	
	
?>

<?php include('header.php') ?>
<div class="container">
		<h3>Konfirmasi Tanggapan Anda </h3>
		<div class="row">
				<table class="table">
					<tr>
						<th> Id Faktur </th>
						<td> <?php echo $detpem["id_faktur_rinci"]; ?> </td>
					</tr>
					<tr>
						<th>Nama</th>
						<td><?php echo $detpem["nm_pembeli"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo  date("d F Y",strtotime($detpem["tgl_rinci"])); ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detpem["tot_bayar"]); ?></td>
					</tr>
				</table>
		</div>
		<div class="row">
			<div class="col-md-12">
			<div class="alert alert-info"> <strong>Terimakasih telah mempercayakan jasa kami! Silahkan untuk mengisi penilaian untuk mengkonfirmasi </strong> </div>
			</div>
		</div>
			
			
			
			<div class="col-md-6" STYLE="BACKGROUND-IMAGE:URL(bgkonfir.jpg)">
				<form  method="post">
				<div>
					<h3>Silahkan Beri Rating Anda❣ </h3>
				</div>
				<div class="rateyo" id= "rating"
					data-rateyo-rating="4"
					data-rateyo-num-stars="5"
					data-rateyo-score="3">
				</div>

					<span class='result'>0</span>
					<input type="hidden" name="rating">
				<div class="col-md-12">
				<div class="form-group"><br>
					<label>Penilaian Anda</label>
					<textarea class="form-control" name="nilai" placeholder="Berikan Penilaian Anda" rows="3" required></textarea>
				</div>
				</div>
				<br>
				<button class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
				<a href="riwayat.php" class="btn btn-success">Kembali</a>
				</form>
				
				</br> </br>
			</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

    

</script>
		<?php 
				if(isset($_POST["konfirmasi"]))
			{
				$nilai =$_POST["nilai"];
				$rate =$_POST["rating"];
				$koneksi->query("UPDATE faktur_rinci SET penilaian='$nilai', rating='$rate', komplain='-' WHERE id_faktur_rinci='$id_rinci'");
				echo "<script>alert('Terimakasih atas penilaian anda :) ');</script>";
				echo "<script>location='riwayat.php';</script>";
			}
		?>
	</div>
</body>
</html>