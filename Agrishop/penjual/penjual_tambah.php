<?php
 
	// mengambil data kota dengan kode paling besar
	$query1 = mysqli_query($koneksi, "SELECT max(id_penjual) as kodeTerbesar FROM penjual");
	$data1 = mysqli_fetch_array($query1);
	$id_penjual = $data1['kodeTerbesar'];
 
	// mengambil angka dari kode kota terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_penjual, 4, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode kota baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "PNJL";
	$id_penjual = $huruf . sprintf("%03s", $urutan);
?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH PENJUAL
            </div>
				<form method = "post" enctype ="multipart/form-data">
						<div class="form=group">
             <label> Id Bank </label>
                <select class="form-control" name="id_bank" required>
                   <option readonly value = "---">
                    <?php $ambil1=$koneksi->query("SELECT * FROM bank");?>
                    <?php while($pecah=$ambil1->fetch_assoc()){?>
                   <option value="<?php echo $pecah['id_bank']?>"> <?php echo $pecah['id_bank']?> --- <?php echo $pecah['nm_bank']?></option>
                     <?php } ?>
                </select>
            </div>
						<div class="form=group">
							<label> Kota </label>
							<select class="form-control" name="id_kota" required>
							<?php $ambil1=$koneksi->query("SELECT * FROM kota");?>
							<?php while($pecah=$ambil1->fetch_assoc()){?>
							<option value="<?php echo $pecah['id_kota']?>"> <?php echo $pecah['id_kota']?> --- <?php echo $pecah['nm_kota']?></option>
							<?php } ?>
							</select>
					 </div>
					 <div class="form-group">
              <label> Tanggal Daftar Penjual </label>
              <input type="date" class="form-control" name="tanggal_daftar">
           </div>
					
					 <div class="form-group"><div class="form-group">
					 	<label> ID Penjual </label>
						<input type="text" class="form-control" name="id_penjual" readonly value="<?php echo $id_penjual ?>">
					</div>
					<div class="form-group">
						<label> Nama Penjual </label>
						<input type="text" class="form-control" name="nm_pen">
					</div>
					<div class="form-group">
						<label> Alamat Penjual </label>
						<input type="text" class="form-control" name="alamat_pen">
					</div>
					<div class="form-group">
						<label> No HP Penjual </label>
						<input type="text" class="form-control" name="no_hp_penjual">
					</div>
					<div class="form-group">
						<label> Username Penjual </label>
						<input type="text" class="form-control" name="username_penjual">
					</div>
					<div class="form-group">
						<label> Password Penjual </label>
						<input type="text" class="form-control" name="password_penjual">
					</div>
					<div class="form-group">
						<label> Nomor Rekening Penjual </label>
						<input type="text" class="form-control" name="no_rek_penjual">
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

	$koneksi->query("INSERT INTO penjual (id_penjual, id_bank, nm_pen, alamat_pen, kota, no_hp_penjual, username_penjual, password_penjual, no_rek_penjual, tanggal_daftar) 
	VALUES ('$_POST[id_penjual]','$_POST[id_bank]','$_POST[nm_pen]', '$_POST[alamat_pen]', '$_POST[id_kota]', '$_POST[no_hp_penjual]', '$_POST[username_penjual]', '$_POST[password_penjual]', '$_POST[no_rek_penjual]', '$_POST[tanggal_daftar]')");
	echo "<div class='alret alret-info'>Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penjual'>";
}
?>
	