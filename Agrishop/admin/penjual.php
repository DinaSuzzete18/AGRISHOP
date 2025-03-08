    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="table/css/style.css">
	<section>
					<h4 class="text-center mb-4"> Daftar Penjual</h4>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=penjual_cari">
<div class="col-md-3">
<table border="0">
<tr>
	<td><div class="form-group">
		<input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
	<td><button class="btn btn-primary" name="cari"> Cari </button>
	</div>
</tr>
</table>
</div>

</form>
<div class="table-wrap">
	<table class="table">
	<thead class="thead-primary">
		<tr>
			<th> No</th>
			<th> ID Penjual</th>
			<th> ID Bank</th>
			<th> Nama Penjual</th>
			<th> Kota Penjual </th>
			<th> Alamat Penjual</th>
			<th> No HP Penjual </th>
			<th>Username Penjual</th>
			<th> Password Penjual</th>
			<th> No Rekening Penjual </th>
			<th> Tanggal Daftar Penjual </th>
			<th> Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php 
		$ambil=$koneksi->query("SELECT * FROM penjual JOIN bank ON penjual.id_bank=bank.id_bank JOIN kota ON penjual.kota=kota.id_kota"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td> <?php echo $nomor?> </td>
			<td> <?php echo $pecah['id_penjual']?> </td>
			<td> <?php echo $pecah['nm_bank']?> </td>
			<td> <?php echo $pecah['nm_pen']?>
			<td> <?php echo $pecah['nm_kota']?> </td>
			<td> <?php echo $pecah['alamat_pen']?> </td>
			<td> <?php echo $pecah['no_hp_penjual']?> </td>
			<td> <?php echo $pecah['username_penjual']?> </td>
			<td> <?php echo $pecah['password_penjual']?> </td>
			<td> <?php echo $pecah['no_rek_penjual']?> </td>
			<td> <?php echo $pecah['tanggal_daftar']?> </td>
			<td>
				<a href="index.php?halaman=penjual_hapus&id_penjual=<?php echo $pecah['id_penjual']; ?>" 
				class="btn-danger btn"> Hapus </a>
				<a href="index.php?halaman=penjual_ubah&id_penjual=<?php echo $pecah['id_penjual']; ?>" 
				class="btn-warning btn"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
	</table>
<a href="index.php?halaman=penjual_tambah" class = "btn btn-primary"> Tambah Data </a>
</div>
	</section>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>