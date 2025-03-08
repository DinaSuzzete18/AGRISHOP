    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="table/css/style.css">
	<section>
					<h4 class="text-center mb-4"> Daftar Pengiriman</h4>
          <form class="form-horizontal" role="search" method="post" action="index.php?halaman=daftar_pengiriman_cari">
          <div class="col-md-3">
          <table border="0">
          <tr>
            <td><div class="form-group">
              <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
            <td><button class="btn btn-primary" name="cari"> Cari </button>
            </td>
          </tr>
          </table>
          </div>

          </form>
          </div>
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
					        <th> No</th>
                  <th> Id Daftar Pengiriman </th>
                  <th> Tarif Pengiriman </th>
                  <th> Id Sistem Pengiriman </th>
                  <th> Id Kategori </th>
                  <th> Id Kota Asal </th>
                  <th> Id Kota Tujuan </th>
                  <th> Aksi</th>
					      </tr>
					    </thead> 
					    <tbody>
					      <?php $nomor=1; ?>
                <?php 
                $ambil=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman JOIN kota ON daftar_pengiriman.id_kota_asal =kota.id_kota JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim
               "); ?>
               <?php $ambill=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kota ON daftar_pengiriman.id_kota_tujuan =kota.id_kota"); ?>
                <?php while ($pecah=$ambil->fetch_assoc() AND $pecah1=$ambill->fetch_assoc() ){ ?>
                <tr>
                  <td> <?php echo $nomor?> </td>
                  <td> <?php echo $pecah['id_daftar_pengiriman']?> </td>
                  <td>Rp. <?php echo $pecah['tarif_pengiriman']?> </td>
                  <td> <?php echo $pecah['nm_sistem_pengiriman']?>--<?php echo $pecah['nm_jasa_kirim']?> </td>
                  <td> <?php echo $pecah['nm_kategori']?> </td>
                  <td> <?php echo $pecah['nm_kota']?> </td>
                  <td> <?php echo $pecah1['nm_kota']?> </td>
                  <td>
                    <a href="index.php?halaman=daftar_pengiriman_hapus&id_daftar_pengiriman=<?php echo $pecah['id_daftar_pengiriman']; ?>" 
                    class="btn-danger btn"> Hapus </a>
                    <a href="index.php?halaman=daftar_pengiriman_ubah&id_daftar_pengiriman=<?php echo $pecah['id_daftar_pengiriman']; ?>" 
                    class="btn-warning btn"> Ubah </a>
                  </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
					    </tbody>
					  </table>
            <a href="index.php?halaman=daftar_pengiriman_tambah" class = "btn btn-primary"> Tambah Data </a>
					</div>
				</div>
			</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

