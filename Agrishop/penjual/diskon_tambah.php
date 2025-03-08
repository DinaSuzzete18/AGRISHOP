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
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH DISKON
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> Id Diskon </label>
		<input type="text" class="form-control" name="id_diskon" readonly value="<?php echo $id_diskon; ?>">
	</div>
	<div class="form-group">
		<label> Nama Diskon </label>
		<input type="text" class="form-control" name="nm_diskon">
	</div>
	<div class="form-group">
		<label> Harga Diskon </label>
		<input type="text" class="form-control" name="hrg_diskon">
	</div>
	<div class="form-group">
		<label> Tanggal Muncul Diskon </label>
		<input type="date" class="form-control" name="tgl_muncul">
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
	$koneksi->query("INSERT INTO diskon (id_diskon, nm_diskon, hrg_diskon, tgl_muncul) 
	VALUES ('$_POST[id_diskon]','$_POST[nm_diskon]', '$_POST[hrg_diskon]', '$_POST[tgl_muncul]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=diskon'>";
}
?>
	