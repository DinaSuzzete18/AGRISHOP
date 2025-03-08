<?php
include ('koneksi.php');
session_start();
//echo "<pre>";
//echo  print_r($_SESSION);
//echo "</pre>";
$id_log = $_SESSION["pembeli"]["id_pembeli"];
$id_jenis_pembeli = $_SESSION["pembeli"]["id_jenis_pembeli"];
$ambildata=$koneksi->query("SELECT * FROM pembeli WHERE id_pembeli='$id_log'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Profil</title>
  </head>

 <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT PROFIL
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> Nama Pembeli </label>
                    <input type="text" class="form-control" name="Nama_Pembeli"required>
                    </div>

                    <div class="form-group">
                    <label> Alamat Pembeli </label>
                    <input type="text" class="form-control" name="Alamat_Pembeli"required>
                    </div>

                    <div class="form-group">
                    <label> Nomor Handphone Pembeli </label>
                    <input type="text" class="form-control" name="No_Handphone_Pembeli"required>
                    </div>                

                    <div class="form-group">
                    <label> Nomor Rekening Pembeli</label>
                    <input type="text" class="form-control" name="no_rek_pembeli"required>
                    </div>

                    <div class="form-group">
                    <label> Username Pembeli </label>
                    <input type="text" class="form-control" name="Username_Pembeli"required>
                    </div>

                    <div class="form-group">
                    <label> Password Pembeli </label>
                    <input type="text" class="form-control" name="Password_Pembeli"required>
                    </div>

	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
</div>
          </div>
        </div>
      </div>
    </div>
<?php
if(isset ($_POST['ubah']))
{
	
	$koneksi->query("UPDATE pembeli SET id_pembeli='$id_log',
  id_jenis_pembeli='$id_jenis_pembeli',
	nm_pembeli='$_POST[Nama_Pembeli]', 
  pw_pembeli='$_POST[Password_Pembeli]',
  usser_pembeli='$_POST[Username_Pembeli]', 
	almt_pembeli='$_POST[Alamat_Pembeli]', 
	no_hp_pembeli='$_POST[No_Handphone_Pembeli]', 
  no_rek_pembeli='$_POST[no_rek_pembeli]' 
    WHERE id_pembeli='$id_log'");
		
	echo "<script> alert(' Data pembeli Berhasil Diubah');</script>";
	echo "<script>location='akun.php?halaman=pembeli';</script>";
}
?>
	 </body>
</html>