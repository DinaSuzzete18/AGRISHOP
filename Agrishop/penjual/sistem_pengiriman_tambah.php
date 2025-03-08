<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH SISTEM PENGIRIMAN
            </div>
            <div class="card-body">
<form method = "post" enctype ="multipart/form-data">
  <div class="form-group">
    <label> Id Sistem Pengiriman </label>
    <input type="text" class="form-control" name="id_sistem_pengiriman">
  </div>
  <div class="form-group">
    <label> Nama Sistem Pengiriman </label>
    <input type="text" class="form-control" name="nm_sistem_pengiriman">
  </div>
  <div class="form=group">
    <label>Id Jasa Kirim </label>
    <select name= "id_jasa_kirim">
      <option>Pilih
      <?php
      include "conf/config.php";
      $query= mysqli_query($koneksi, "SELECT * FROM jasa_kirim");
      while ($data= mysqli_fetch_array($query)){
        echo "<option value=$data[id_jasa_kirim]> $data[nm_jasa_kirim] </option>";
      }
      ?>
      </option></select>
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
  $koneksi->query("INSERT INTO sistem_pengiriman (id_sistem_pengiriman, nm_sistem_pengiriman, id_jasa_kirim) 
  VALUES ('$_POST[id_sistem_pengiriman]', '$_POST[nm_sistem_pengiriman]', '$_POST[id_jasa_kirim]')");
  echo "<div class='alret alret-info'>Data Tersimpan </div>";
  echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=sistem_pengiriman'>";
}
?>
  