<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UBAH SISTEM PENGIRIMAN 
            </div>
            <div class="card-body">
<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM sistem_pengiriman WHERE id_sistem_pengiriman='$_GET[id_sistem_pengiriman]'");
$pecah=$ambil->fetch_assoc ();

?>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form=group">
    <label>Id Sistem Pengiriman </label>
    <input type="text" class="form-control" name="id_sistem_pengiriman" value="<?php echo $pecah['id_sistem_pengiriman'];?>">
  </div>
  <div class="form=group">
    <label>Nama Sistem Pengiriman </label>
    <input type="text" class="form-control" name="nm_sistem_pengiriman" value="<?php echo $pecah['nm_sistem_pengiriman'];?>">
  </div>

  <div class="form=group">
    <label> ID Jasa Kirim </label>
    <select class="form-control" name="id_jasa_kirim" required>
    <?php $ambill=$koneksi->query("SELECT * FROM jasa_kirim ");?>
    <?php while($pecah=$ambill->fetch_assoc()){?>
  <option value="<?php echo $pecah['id_jasa_kirim'] ?>" > <?php echo $pecah['id_jasa_kirim'] ?>--<?php echo $pecah['nm_jasa_kirim'] ?></option>
  <?php } ?>
  </select>
  </div>
  
  <br/>
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
  
    $koneksi->query("UPDATE sistem_pengiriman SET id_sistem_pengiriman = '$_POST[id_sistem_pengiriman]', nm_sistem_pengiriman='$_POST[nm_sistem_pengiriman]', id_jasa_kirim='$_POST[id_jasa_kirim]' WHERE id_sistem_pengiriman='$_GET[id_sistem_pengiriman]'");

  echo "<script> alert('Data Berhasil di Ubah');</script>";
  echo "<script>location='index.php?halaman=sistem_pengiriman';</script>";
}
?>
  