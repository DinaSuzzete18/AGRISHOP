<?php
session_start();
echo "<pre>";
echo  print_r($_SESSION);
echo "</pre>";
if(!isset($_SESSION["pembeli"]))
{
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
}
include('koneksi.php');

if(!isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Silahkan belanja dulu');</script>";
	echo "<script>location='shop.php';</script>";
}
$kode_sistem_pengiriman="";
 $ID_Kategori="";
 $strq="";
 $strw="";
 $jmlh=0;
if (isset($_GET['kode_sistem_pengiriman']))
 {
	 $kode_sistem_pengiriman=$_GET['kode_sistem_pengiriman'];
	 $strc[]="daftar_pengiriman.id_sistem_pengiriman='$id_sistem_pengiriman'";
	 $jmlh++;
 } 
 if (isset($_GET['id_kategori']))
 {
	 $ID_Kategori=$_GET['ID_Kategori'];
	 $strc[]="daftar_pengiriman.ID_Kategori='$ID_Kategori'";
	 $jmlh++;
 }

 $i=1;
 if($jmlh>0)
 {
	$strw="WHERE ";
	foreach ($strc as $strs)
	{
		$strw .=$strs;
		if($i<$jmlh)
		{
			$strw .=" AND ";
			$i++;
		}
	}
 }
?>

<?php include 'header.php' ?>
<!--table Keranjang -->
<section class="konten">
	<h4 class="text-center mb-4"> CHECKOUT</h4>
	<div class="col-md-12">
 	<div class="col-md-12">
	<br>
	<div class="row">
		<div class="col-md-4">
		<label>Nama Pembeli</label>
			<div class="form-group"> 
				<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['nm_pembeli']?>"class="form-control">
			</div>
		</div>
		<div class="col-md-4">
		<label>Alamat</label>
			<div class="form-group"> 
			<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['almt_pembeli']?>"class="form-control">
			</div>
		</div>
		<div class="col-md-2">
			<label>No Handphone Pembeli</label>
			<div class="form-group"> 
				<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['no_hp_pembeli']
				?>"class="form-control">
			</div>
		</div>
		<div class="col-md-2">
			<label>Kota Pembeli</label>
			<div class="form-group"> 
				<?php $kota_tujuan=$_SESSION["pembeli"]['id_kota_tujuan'];
				$ambilll=$koneksi->query("SELECT * FROM pembeli join kota on pembeli.id_kota_tujuan=kota.id_kota WHERE id_kota_tujuan='$kota_tujuan' "); 
					$pecahhh=$ambilll->fetch_assoc();
				 ?>
				<input type="text" readonly value="<?php echo $pecahhh['nm_kota'] ?>"class="form-control">
			</div>
		</div>
	</div>

	<br/>
	<div class="table-wrap">


			<?php $penjual=[]; $noo=0;?> <?php $totalkeseluruhan = 0; ?>
			<?php foreach ($_SESSION['keranjang'] as $id_barang => $qty): ?>
			<?php $ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota=kota.id_kota WHERE id_barang='$id_barang' "); 
			  $pecah=$ambil->fetch_assoc(); ?>
			<?php 
			if ($noo == 0) { $penjual[]=$pecah['id_penjual']; $noo++;}
			else {$tc=0;$tcc=0;
				foreach($penjual as $id)
					if($id==$pecah['id_penjual']) {$tcc++;}
					if($tc==$tcc){$penjual[]=$pecah['id_penjual']; $noo++;}
					$tc++;
				}
				 endforeach; 
			
			?>
<?php $nop=0;$tot_pesanan=[]; ?>
<?php foreach ($penjual as $id): ?>	
	<?php 
		$barang=[];
		$qtyy=[];
		foreach ($_SESSION['keranjang'] as $id_barang => $qty): 
		$ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota=kota.id_kota WHERE id_barang='$id_barang' AND penjual.id_penjual='$id'"); 
		$pecah=$ambil->fetch_assoc();
		if (empty($pecah['id_barang'])) {;}
		else{$barang[]= $pecah['id_barang'];
			 $qtyy[]= $qty;}

	endforeach;
	//print_r($barang);
	?>
		<table class="table">
		<thead class="thead-primary">
		<tr>
			<th> No</th>
			<th> Penjual </th>
			<th> Kota Penjual </th>
			<th> Barang </th>
			<th> Harga </th>
			<th> Berat </th>
			<th> QTY </th>
			<th> Sub Harga</th> 
		</tr>
		</thead>
		<tbody class="tbody-primary">
		<?php $no=1; ?>
		<?php $totalpesanan=0; $totalbarang=0; $totalbelanja=0; ?>
		<?php $berat_ttl=0; ?>
		<?php foreach ($barang as $id_barang): ?>
			<!--Menampilkan Produk yang diperulangkan dari id produk line 64-->
		<?php $ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota=kota.id_kota WHERE id_barang='$id_barang' AND penjual.id_penjual='$id'"); 
			  $pecah=$ambil->fetch_assoc();
			  $subharga= $pecah['harga']*$qtyy[$no-1];
			  $Berat_Barang=$pecah['berat']*$qtyy[$no-1];
			  $totalbarang+=$qtyy[$no-1];
			  $kota_penjual=$pecah['nm_kota']; 
			  print_r($kota_penjual);
		?>
		
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $pecah['nm_pen']?></td>
				<td><?php echo $pecah['nm_kota']?></td>
				<td><?php echo $pecah['nm_barang']?></td>
				<td>Rp.<?php echo number_format($pecah['harga']); ?></td>
				<td><?php echo number_format($pecah['berat']); ?> kg</td>
				<td><?php echo $qtyy[$no-1] ?></td>
				<td>Rp.<?php echo number_format($subharga); ?></td>
			</tr>
		<?php $no++; ?>
		<?php $totalpesanan+=$subharga; ?>
		<?php $berat_ttl+=$Berat_Barang;?>
		<?php $kota_penjual= $pecah['nm_kota']; ?>
		<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr> 
				<th colspan='7' > Berat Total </th>
				<th>  <?php  echo number_format($berat_ttl) ?> kilogram </th>
			</tr>
			<tr> 
				<?php $ambil1=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman 
			JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori 
			JOIN kota ON daftar_pengiriman.id_kota_asal=kota.id_kota WHERE nm_kota= '$kota_penjual'");
			$ambil3=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_Pengiriman 
			JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori 
			JOIN kota ON daftar_pengiriman.id_kota_asal=kota.id_kota $strw");
					$ambil2=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kota ON daftar_pengiriman.id_kota_tujuan =kota.id_kota 
					WHERE id_kota_tujuan='$kota_tujuan'  ")?>
			<?php $pecah=$ambil1->fetch_assoc() AND $pecah1=$ambil2->fetch_assoc() and $pecah1=$ambil3->fetch_assoc() ?>
			<tr> 
				<th> Pengiriman </th>
				<th colspan='5' > <?php echo $pecah['nm_kategori']?>-<?php echo $pecah['nm_jasa_kirim']?>  </th>
				<th>  Rp. <?php  if (!isset($_GET['tarif_pengiriman'])){ ?>
						<?php echo $pecah['tarif_pengiriman']?> 
						<?php } else{ $tarif= $_GET['tarif_pengiriman']?>
						<?php echo $tarif ; ?> <?php print_r($tarif) ?>
						<?php } ?>	
						</th>
				<td>  <a href ="daftar_pengiriman_ubah.php?nm_kota=<?php echo $pecah['nm_kota']?>" class="btn btn- btn-info"> Edit</a> </td>
			</tr>
			</tr>
			<tr> 
				<th colspan='7' > Total Pesanan </th>
				<th> Rp. <?php  $total_seluruh[] = $totalpesanan +$pecah['tarif_pengiriman'];

				echo number_format($total_seluruh[$nop]) ;  $total=count($tot_pesanan)?>  </th>  
				<th>  </th>  
			</tr>
		</tfoot>
		</table> 
		<?php $totalkeseluruhan += $total_seluruh[$nop]; ?>
		<?php $nop++; endforeach; ?>
		<p style="text-align: right;" ><b> Total Belanja: Rp. <?php  echo number_format($totalkeseluruhan) ?> </b></p>	
	
<?php print_r($tot_pesanan);  print_r($total)?></select></div></form></div></div>

<!--Ended table Keranjang -->
<?php include 'footer.php' ?>