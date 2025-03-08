<?php
session_start ();
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

$koneksi=new mysqli("localhost", "root", "", "agrishop");

if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']))
{
    echo "<script> alert('Keranjang Kosong'); </script>";
    echo "<script> location='shop.php'; </script>";
}
?>
<?php include 'header.php' ?>
<!--table Keranjang -->
<section>
<br/>
	<h4 class="text-center mb-4"> Keranjang Belanja</h4>
<div class="col-md-12">
 	<div class="col-md-12">
	<div class="table-wrap">
		<table class="table">
		<thead class="thead-primary">
		<tr>
			<th> No</th>
            <th> Penjual </th>
			<th> Barang </th>
			<th> Harga </th>
            <th> Berat </th>
            <th> QTY </th>
			<th> Sub Harga</th> 
            <th> Aksi </th>  
		</tr>
		</thead>
		<tbody class="tbody-primary">
		<?php $no=1; ?>
		<?php foreach ($_SESSION['keranjang'] as $id_barang => $jumlah): ?>
			<!--Menampilkan Produk yang diperulangkan dari id produk line 64-->
		<?php $ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.id_penjual=penjual.id_penjual WHERE id_barang= '$id_barang'");
			  $pecah=$ambil->fetch_assoc();
			  $subharga= $pecah['harga']*$jumlah;
              $Berat_Barang=$pecah['berat']*$jumlah;
              $max_barang=$pecah['stok'];
              //print_r($max_barang);
		?>
		
			<tr>
				<td><?php echo $no?></td>
                <td><?php echo $pecah['nm_pen'] ?></td>
                <td><?php echo $pecah['nm_barang']?></td>
                <td>Rp.<?php echo number_format($pecah['harga']); ?></td>
                <td><?php echo number_format($pecah['berat']); ?> kg</td>
                <td><?php if( $jumlah<$max_barang) { echo $jumlah;}
                 else { echo $max_barang;} ?> </td>
                
                <td>Rp.<?php echo number_format($subharga); ?></td>
                <td>
                    <a href="keranjang_hapus.php?id_barang=<?php echo $id_barang; ?>" 
                    class="btn-danger btn"> Hapus </a>
                </td>
			</tr>
		<?php $no++; ?>
		<?php endforeach ?>
		</tbody>
		</table>
        <br><br>
        <a href="shop.php" class = "btn btn-default"> Lanjutkan Belanja </a>
        <a href="checkout.php" class = "btn btn-primary"> Checkout  </a>
        <br/><br/> <br/> <br/> <br/><br/><br/> <br/> <br/> <br/><br/><br/> <br/> <br/> <br/>
	</div>
	</div>
</div>
<br/>
</section>
<!--Ended table Keranjang -->
<!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">AGRISHOP</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Palembang, Sumatera Selatan.Indonesia
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2022 Company Name 
                            | Designed by <a rel="sponsored" href="" target="_blank">Agrishop</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets2/js/jquery-1.11.0.min.js"></script>
    <script src="assets2/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets2/js/bootstrap.bundle.min.js"></script>
    <script src="assets2/js/templatemo.js"></script>
    <script src="assets2/js/custom.js"></script>
    <!-- End Script -->
</body>
</html>