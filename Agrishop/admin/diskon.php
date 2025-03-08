<!--UNTUK KODE FAKTUR Bertambah-->
<?php
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_diskon) as kodeTerbesar FROM diskon");
    $data1 = mysqli_fetch_array($query1);
    $id_diskon = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_diskon, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "IDKOSN";
    $id_diskon = $huruf . sprintf("%03s", $urutan);
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="table/css/style.css">
	<section>
					<h4 class="text-center mb-4"> Daftar Diskon</h4>
          <form class="form-horizontal" role="search" method="post" action="index.php?halaman=diskon_cari">
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
					        <b><th> No</th>
                  <th> ID Diskon</th>
                  <th> Nama Diskon</th>
                  <th> Harga Diskon </th>
                  <th> Tanggal Muncul </th>
                  <th> Aksi</th></b>
					      </tr>
					    </thead>
					    <tbody>
					      <?php $nomor=1; ?>
                <?php $ambil=$koneksi->query("SELECT * FROM diskon"); ?>
                <?php while ($pecah=$ambil->fetch_assoc()){ ?>
                <tr>
                  <td> <?php echo $nomor?> </td>
                  <td> <?php echo $pecah['id_diskon']?> </td>
                  <td> <?php echo $pecah['nm_diskon']?> </td>
                  <td> <?php echo $pecah['tgl_muncul']?> </td>
                  <td> Rp.<?php echo number_format($pecah['hrg_diskon']); ?> </td>

                  <td>
                    <a href="index.php?halaman=diskon_hapus&id_diskon=<?php echo $pecah['id_diskon']; ?>" 
                    class="btn-danger btn"> Hapus </a>
                    <a href="index.php?halaman=diskon_ubah&id_diskon=<?php echo $pecah['id_diskon']; ?>" 
                    class="btn-warning btn"> Ubah </a>
                  <td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
					    </tbody>
					  </table>
            <a href="index.php?halaman=diskon_tambah" class = "btn btn-primary"> Tambah Data </a>
					</div>
				</div>
			</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

