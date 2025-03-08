<!--UNTUK KODE Jenis Pembeli Bertambah-->
<?php
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_jenis_pembeli) as kodeTerbesar FROM jenis_pembeli");
    $data1 = mysqli_fetch_array($query1);
    $id_jenis_pembeli = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_jenis_pembeli, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "JNSPMB";
    $id_jenis_pembeli = $huruf . sprintf("%03s", $urutan);
?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JENIS PEMBELI
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Jenis Pembeli </label>
		<input type="text" class="form-control" name="id_jenis_pembeli" readonly value="<?php echo $id_jenis_pembeli;?>">
	</div>
	<div class="form-group">
		<label> Nama Jenis Pembeli </label>
		<input type="text" class="form-control" name="nm_jenis_pembeli">
	</div>
	<div class="form=group">
		<label>Jumlah Potongan  </label>
		<input type="text" class="form-control" name="jumlah_potongan" >
	</div> <br>
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
	$koneksi->query("INSERT INTO jenis_pembeli (id_jenis_pembeli, nm_jenis_pembeli, jumlah_potongan) 
	VALUES ('$_POST[id_jenis_pembeli]','$_POST[nm_jenis_pembeli]', '$_POST[jumlah_potongan]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenis_pembeli'>";
}
?>
	