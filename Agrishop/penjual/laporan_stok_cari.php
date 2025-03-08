<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="table/css/style.css">

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Data Laporan Stok Barang</h6>
</div>
<form method="post">
	<div class="row">
			<button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
		</div>
</form>
<form method="POST" action="index.php?halaman=laporan_stok_cari">
	<div class="row">
	<div class="col-md-3">
	    <div class="form-group">
	        <label> Dari Tanggal </label>
	        <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai?>">
	      </div>
	</div>
	<div class="col-md-3">
	    <div class="form-group">
	        <label> Sampai Tanggal </label>
	        <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai?>">
	      </div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
      <div class="form-group">
        <label>Jenis Barang </label>
        <select class="form-control" name="status12">
          <option value=" " >Jenis Barang</option>
          <option value="Sayur">Sayur</option>
          <option value="Daging">Daging</option>
          <option value="Buah">Buah</option>
          <option value="Seafood & Ikan">Seafood & Ikan</option>
          <option value="Barang Pokok">Barang Pokok</option>
        </select>
      </div>
  </div>

  <div class="col-md-3">
      <div class="form-group">
        <label>Stok Barang </label>
        <select class="form-control" name="status13">
          <option value=" " >Stok Barang</option>
          <option value="0">Habis</option>
          <option value="1-5">1-5</option>
        </select>
      </div>
  </div>

	<div class="col-md-2">
      <label></label><br>
      <button class="btn btn-primary" name="lihat">Lihat</button>
  </div>
	</div>
</form>
<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if(isset($_POST["lihat"]))
{
  $tgl_mulai=$_POST["tglm"];
  $tgl_selesai=$_POST["tgls"];
  $status12=$_POST["status12"];
  $status13=$_POST["status13"];
  $ambil=$koneksi->query("SELECT * FROM barang join penjual on barang.id_penjual=penjual.id_penjual JOIN kelompok_barang ON barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang join jenis_barang on kelompok_barang.id_jenis=jenis_barang.id_jenis
              WHERE jenis_barang.nm_jns_brg='$status12' OR stok='$status13' OR tanggal_stok BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  while($pecah = $ambil->fetch_assoc())
  {
    $semuadata[]=$pecah;
  }
}
?>
<div class="table-wrap">
	<table class="table">
		<thead class="thead-primary">
				<tr>
					<th> No</th>
					<th> Id Barang</th>
					<th> Nama Barang</th>
          <th> Kelompok Barang </th>
					<th> Jenis Barang</th>
					<th> Foto Barang</th>
          <th> Stok </th>
          <th> Penjual</th>
          <th> Tanggal Stok </th>
          <th> Aksi </th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1;?>
    	<?php foreach ($semuadata as $key =>$value):?>
    		<tr>
    			<td> <?php echo $value['id_barang']?> </td>
          <td> <?php echo $value['nm_barang']?> </td>
          <td> <?php echo $value['nm_kelompok_barang']?> </td>
          <td> <?php echo $value['nm_jns_brg']?> </td>
          <td> <img src="photo/<?php echo $value['foto_barang'];?>" width="120"></td>
          <td> <?php echo $value['deskripsi']?> </td>
          <td> <?php echo number_format($value['berat'])?> Kg</td>
          <td> <?php echo number_format($value['stok'])?> Kg</td>
          <td> <?php echo $value['nm_pen']?> </td>
          <th> <?php echo $value['tanggal_stok']?></th>
    		</tr>
    		<?php $nomor++; ?>
        <?php endforeach ?>        
		</tbody>
	</table>
</div>