  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="table/css/style.css">
  <section>
          <h4 class="text-center mb-4"> TRANSAKSI</h4>
          <form class="form-horizontal" role="search" method="post" action="index.php?halaman=faktur_rinci_cari">
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
                  <th><b> No </b></th>
                  <th><b> Id Faktur Rinci </b></th>
                  <th><b> Id Barang </b></th>
                  <th><b> Tanggal Transaksi</b></th>
                  <th><b> QTY Barang </b></th>
                  <th><b> Sub Total </b></th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor=1; ?>
                <?php $penghasilan=0;?>
                <?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN faktur_rinci ON transaksi.id_faktur_rinci=faktur_rinci.id_faktur_rinci JOIN 
                barang ON transaksi.id_barang=barang.id_barang "); ?>
                <?php while ($pecah=$ambil->fetch_assoc()){ ?>
                <tr>
                  <td> <?php echo $nomor?> </td>
                  <td> <?php echo $pecah['id_faktur_rinci']?> </td>
                  <td> <?php echo $pecah['tgl_rinci']?> </td>
                  <td> <?php echo $pecah['nm_barang']?> </td>
                  <td> <?php echo $pecah['qty_barang']?> </td>
                  <td> RP. <?php echo number_format($pecah['sub_tot']); ?> </td>       
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
              </tbody>
            </table>
            <br/>
          </div>
        </div>
      </div>
  </section>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>