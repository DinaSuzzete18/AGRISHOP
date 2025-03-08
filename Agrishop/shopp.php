<?php
session_start();
include ("koneksi.php");
$kelompok_barang = "";
$penjual = "";
$strq = "";
$strw = "";
$jmlget = 0;

if(isset($_GET['kelompok_barang'])){
      $kelompok_barang = $_GET['kelompok_barang'];
      $strc[] = "barang.id_kelompok_barang= '$kelompok_barang'";
      $jmlget++;
    }
if(isset($_GET['penjual'])){
      $penjual = $_GET['penjual'];
      $strc[] = "barang.id_Penjual = '$penjual'";
      $jmlget++;
    }
if(isset($_GET['jenis_barang'])){
      $jenis_barang = $_GET['jenis_barang'];
      $strc[] = "kelompok_barang.id_jenis= '$jenis_barang'";
      $jmlget++;
    }
if(isset($_GET['kota_asal'])){
      $kota_asal = $_GET['kota_asal'];
      $strc[] = "penjual.kota= '$kota_asal'";
      $jmlget++;
    }
    // susun string
    $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }

    

    $query = "SELECT * FROM barang inner join kelompok_barang on barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN jenis_barang ON kelompok_barang.id_jenis=jenis_barang.id_jenis
             inner join penjual on barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota = kota.id_kota $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_jen  = "SELECT * FROM jenis_barang";
    $result_jen = mysqli_query($koneksi,$query_jen);

    $query_kota  = "SELECT * FROM penjual join kota ON penjual.kota = kota.id_kota ";
    $result_kota = mysqli_query($koneksi,$query_kota);

    $query_kel  = "SELECT * FROM kelompok_barang";
    $result_kel = mysqli_query($koneksi, $query_kel);
    
    $query_penjual = "SELECT * FROM penjual ";
    $result_penjual = mysqli_query($koneksi, $query_penjual);

?>
<?php include ('header.php'); ?>

        <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="row">
        <form action="shop.php" method="GET">
          <div class="row">
            <div class="col-sm">

                <div class="col-md-12">
                  <div class="products-sort-by mt-2 mt-lg-0">
                      <select name="jenis_barang" class="form-control" id="id_jenis" required>
                        <option selected disabled>-- JENIS BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($result_jen)) { ?>
                                <option value="<?php echo $row['id_jenis']; ?>"> <?php echo $row['nm_jns_brg']; ?></option>
                             <?php } ?>
                        </select>
                      </div>
                </div>
                <div class="col-md-12 ">
                    <div class="products-sort-by mt-2 mt-lg-0">
                        <select class="form-control" name="id_kelompok_barang" id="id_kelompok_barang" required>
                            <option value="">--KELOMPOK BARANG--</option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="products-sort-by mt-2 mt-lg-0">
                      <select name="kota_asal" class="form-control">
                        <option selected disabled>-- KOTA PENJUAL-- </option>
                             <?php while($row = mysqli_fetch_assoc($result_kota)) { ?>
                                <option value="<?php echo $row['id_kota']; ?>"> <?php echo $row['nm_kota']; ?></option>
                             <?php } ?>
                        </select>
                      </div>
                </div>
          <br>
         <div class="row">
            <div class="col-sm">
              <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
            </div>
          </div>
          
          <?php if($resnum == 0){ ?>
          <div class="row">
            <div class="col-sm">
            </br>
              <p> Maaf, Barang Tidak Tersedia</p>
            </div>
          </div>
          <?php } ?>
        </form>
    </div>
<!--ISI SHOP -->

            <div class="col-lg-9">
                <div class='row'>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <?php if($row["stok"]>'0'): ?>
                <div class="col-md-4">
                <ul class='thumbnails'>
                  <div class="card mb-6 product-wap rounded-0">
                    <div class="card rounded-0">
                    <img src="penjual/photo/<?php echo $row['foto_barang']; ?>" alt="">
                    <div class="caption">
                        <h3> <?php echo $row['nm_barang']; ?></h3>
                         <h6> <?php echo $row['nm_pen']; ?></h6>
                         <h6> <?php echo $row['nm_kota']; ?></h6>
                        <h6>Stok Barang: <?php echo $row['stok']; ?></h6>
                        <h6>Rp. <?php echo number_format($row['harga']); ?></h6>
                    </div>
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                        <ul class="list-unstyled">
                        <a class="btn btn-success text-white mt-2" href="beli.php?id_barang=<?php echo $row['id_barang']; ?>"><i class="fas fa-cart-plus"></i></a>
                        </ul>
                         </div>
                    </div>
                  </div>
                </div>
            <?php endif ?>
            <?php } ?>
                </ul>
                </div>
            </div>
                
        </div>
 </div></div></div>
    </div>

    <!-- End Content -->

<?php include('footer.php'); ?>
</body>

</html>
<script>
        $(document).ready(function() {
            $('#id_jenis').change(function() {
                var id_jenis = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'ambil_kelompok_pembayaran.php',
                    data: 'id_jenis='+id_jenis,
                    success: function(response) {
                        $('#id_kelompok_barang').html (response);
                    }
                });
            })
        });
</script>i