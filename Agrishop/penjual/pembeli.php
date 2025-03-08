    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="table/css/style.css">
	<section>
					<h4 class="text-center mb-4"> Daftar Pembeli</h4>
          <form class="form-horizontal" role="search" method="post" action="index.php?halaman=pembeli_cari">
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
					      <tr><b align= "center">
					        <th> No</th>
					        <th> Id Pembeli</th>
					        <th> Id Jenis Pembeli</th>
					        <th> Nama Pembeli</th>
					        <th> Password Pembeli</th>
                  <th> Ussername Pembeli</th>
                  <th> Alamat Pembeli </th>
                  <th> Kota Pembeli </th>
                  <th> No HP Pembeli </th>
					        <th> No Rekening Pembeli </th>
                  <th> Aksi </th>
                  </b>
					      </tr>
					    </thead>
					    <tbody>
					      <?php $nomor=1; ?>
                <?php $ambil=$koneksi->query("SELECT * FROM pembeli join kota on pembeli.id_kota_tujuan=kota.id_kota"); ?>
                <?php while ($pecah=$ambil->fetch_assoc()){ ?>
                <tr>
                  <td> <?php echo $nomor?> </td>
                  <td> <?php echo $pecah['id_pembeli']?> </td>
                  <td> <?php echo $pecah['id_jenis_pembeli']?> </td>
                  <td> <?php echo $pecah['nm_pembeli']?> </td>
                  <td> <?php echo $pecah['pw_pembeli']?> </td>
                  <td> <?php echo $pecah['usser_pembeli']?> </td>
                  <td> <?php echo $pecah['almt_pembeli']?> </td>
                  <td> <?php echo $pecah['nm_kota']?> </td>
                  <td> <?php echo $pecah['no_hp_pembeli']?> </td>
                  <td> <?php echo $pecah['no_rek_pembeli']?> </td>
                  <td>
                    <a href="index.php?halaman=pembeli_hapus&id_pembeli=<?php echo $pecah['id_pembeli']; ?>" 
                    class="btn-danger btn"> Hapus </a>
                    <a href="index.php?halaman=pembeli_ubah&id_pembeli=<?php echo $pecah['id_pembeli']; ?>" 
                    class="btn-warning btn"> Ubah </a>
                  <td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
					    </tbody>
					  </table>
            <a href="index.php?halaman=pembeli_tambah" class = "btn btn-primary"> Tambah Data </a>
					</div>
				</div>
			</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

