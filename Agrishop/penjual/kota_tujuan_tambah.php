<?php
 
	// mengambil data kota dengan kode paling besar
	$query1 = mysqli_query($koneksi, "SELECT max(id_kota) as kodeTerbesar FROM kota");
	$data1 = mysqli_fetch_array($query1);
	$id_kota = $data1['kodeTerbesar'];
 
	// mengambil angka dari kode Kota terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_kota, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode kota baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "KT_";
	$id_kota = $huruf . sprintf("%03s", $urutan);
	?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH KOTA
            </div>
            <div class="card-body">

<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Kota </label>
		<input type="text" class="form-control" name="id_kota" readonly value="<?php echo
		$id_kota;?>">
	</div>
	<div class="form-group">
		<label> Nama Kota </label>
		<input type="text" class="form-control" name="nm_kota">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
if (isset($_POST['save']))
{
	$koneksi->query("INSERT INTO kota (id_kota,nm_kota) 
	VALUES ('$_POST[id_kota]','$_POST[nm_kota]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kota_tujuan'>";
}
?>
	