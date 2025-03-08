<?php
include 'koneksi.php';
?>
<?php

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian']=$_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$_SESSION['session_pencarian']=$_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM barang  join kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang
			  join penjual on barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.id_kota=kota.id_kota WHERE nm_barang LIKE '%$keyword%'")
?>

<?php include 'header.php' ?>
	
	
	<section class="container py-1">
        <div class="row text-center pt-5">
            <div class="col-lg-8 m-auto">
                <h1 class="h1"><strong>Hasil Pencarian</h1></strong>
            </div>
        </div>
        <div class="row">
			<?php $ambildata=$koneksi->query("SELECT * FROM barang inner join kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang ON kelompok_barang.id_jenis=jenis_barang.id_jenis
             inner join penjual on barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota = kota.id_kota WHERE nm_barang LIKE '%$keyword%' ");?>
            <?php while($perproduk = $ambildata->fetch_assoc()){?>
                <div class="col-md-4">
                <ul class='thumbnails'>
                  <div class="card mb-6 product-wap rounded-0">
                    <div class="card rounded-0">
                    <img src="penjual/photo/<?php echo $perproduk['foto_barang']; ?>" alt="">
                    <div class="caption">
                        <h3> <?php echo $perproduk['nm_barang']; ?></h3>
                         <h6> <?php echo $perproduk['nm_pen']; ?></h6>
                         <h6> <?php echo $perproduk['nm_kota']; ?></h6>
                        <h6>Stok Barang: <?php echo $perproduk['stok']; ?></h6>
                        <h6>Rp. <?php echo number_format($perproduk['harga']); ?></h6>
                    </div>
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                        <ul class="list-unstyled">
                        <a class="btn btn-success text-white mt-2" href="beli.php?id_barang=<?php echo $perproduk['id_barang']; ?>"><i class="fas fa-cart-plus"></i></a>
                        </ul>
                         </div>
                    </div>
                  </div>
                </div>
			<?php }; ?>
        </div>
    </section>
	
<!-- Start Footer -->
    <?php include 'footer.php' ?>
	
</body>