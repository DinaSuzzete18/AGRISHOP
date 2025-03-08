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

$query=mysqli_query($koneksi, "SELECT * FROM bank WHERE nm_bank LIKE '%$keyword%'")
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="table/css/style.css">
  <section>
          <h4 class="text-center mb-4"> Daftar Bank</h4>
          <form class="form-horizontal" role="search" method="post" action="index.php?halaman=bank_cari">
          <div class="col-md-3">
          <table border="0">
          <tr>
            <td><div class="form-group">
              <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
            <td><button class="btn btn-primary" name="cari"> Cari </button>
            </td>
          </tr>
          </table>
          </div>

          </form>
          </div>
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-primary">
                <tr>
                  <th> No</th>
                  <th> Id Bank</th>
                  <th> Nama Bank</th>
                  <th> Aksi </th>
                </tr>
              </thead>
  <tbody>
  <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM bank WHERE nm_bank LIKE '%$keyword%'"); ?>
    <?php while ($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
                  <td> <?php echo $nomor?> </td>
                  <td> <?php echo $pecah['id_bank']?> </td>
                  <td> <?php echo $pecah['nm_bank']?> </td>
                  <td>
                    <a href="index.php?halaman=bank_hapus&id_bank=<?php echo $pecah['id_bank']; ?>" 
                    class="btn-danger btn"> Hapus </a>
                    <a href="index.php?halaman=bank_ubah&id_bank=<?php echo $pecah['id_bank']; ?>" 
                    class="btn-warning btn"> Ubah </a>
                  <td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
  </tbody>
    
</table>

<a href="index.php?halaman=barang_tambah" class = "btn btn-primary"> Tambah Data </a>
</div>
        </div>
      </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
