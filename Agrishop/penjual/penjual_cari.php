<?php

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian']=$_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM penjual JOIN kota ON penjual.kota=kota.id_kota WHERE nm_pen LIKE '%$keyword%' OR id_penjual LIKE '%$keyword%' OR nm_kota LIKE '%$keyword%' ")
?>

<h2> Daftar Penjual </h2>
</br>

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

</br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th> No</th>
			<th> Id Penjual</th>
			<th> Id Bank </th>
			<th> Nama Penjual</th>
			<th> Alamat Penjual </th>
			<th> No HP Penjual </th>
			<th> Username Penjual </th>
			<th> Password Penjual</th>
			<th> No Rek Penjual</th>
			<th> Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM penjual JOIN kota ON penjual.kota=kota.id_kota WHERE nm_pen LIKE '%$keyword%' OR id_penjual LIKE '%$keyword%' OR nm_kota LIKE '%$keyword%'"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td> <?php echo $nomor?> </td>
			<td> <?php echo $pecah['id_penjual']?> </td>
			<td> <?php echo $pecah['id_bank']?> </td>
			<td> <?php echo $pecah['nm_pen']?> </td>
			<td> <?php echo $pecah['alamat_pen']?> </td>
			<td> <?php echo $pecah['no_hp_penjual']?> </td>
			<td> <?php echo $pecah['username_penjual']?> </td>
			<td> <?php echo $pecah['password_penjual']?> </td>
			<td> <?php echo $pecah['no_rek_penjual']?> </td>
			<td>
				<a href="index.php?halaman=penjual_hapus&id=<?php echo $pecah['id_penjual']; ?>" 
				class="btn-danger btn"> Hapus </a>
				<a href="index.php?halaman=penjual_ubah&id=<?php echo $pecah['id_penjual']; ?>" 
				class="btn-warning btn"> Ubah </a>
			<td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
		
</table>

<a href="index.php?halaman=penjual_tambah" class = "btn btn-primary"> Tambah Data </a>