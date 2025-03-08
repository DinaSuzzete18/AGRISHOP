<?php
include 'koneksi.php';
?> 
<?php
include ('koneksi.php');
$id_jenis="";
$id_kelompok_barang="";
$strq="";
$strw="";
$jmlh=0;


if (isset($_POST['id_kelompok_barang']))
{
    $id_kelompok_barang=$_POST['id_kelompok_barang'];
    $strc[]="barang.id_kelompok_barang='$id_kelompok_barang'";
    $jmlh++;
} 
if (isset($_POST['id_jenis']))
{
    $id_jenis=$_POST['id_jenis'];
    $strc[]="kelompok_barang.id_jenis='$id_jenis'";
    $jmlh++;
}  
$i=1;
if($jmlh>0)
{
    $strw="WHERE ";
    foreach ($strc as $strs)
    {
        $strw .=$strs;
        if($i<$jmlh)
        {
            $strw .=" AND ";
            $i++;
        }
    }
}
$query="SELECT nm_kelompok_barang,count(barang.id_penjual) 
        AS jumlah FROM barang JOIN kelompok_barang ON barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN penjual ON barang.id_penjual=penjual.id_penjual
$strw GROUP BY barang.id_kelompok_barang";
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                     
$pecah3=$koneksi->query("SELECT * From kelompok_barang");
$pecah2=$koneksi->query("SELECT * From jenis_barang"); 
?>

      <!-- Content -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN DATA PENJUAL BERDASARKAN KELOMPOK DAN JENIS BARANG</h5></center>
                        </div>
                        </ol>

    <form  method="POST">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
        <label>  Kelompok Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="id_kelompok_barang" class="form-control">
                        <option selected disabled>-- KELOMPOK BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($pecah3)) { ?>
                                <option value="<?php echo $row['id_kelompok_barang']; ?>"> <?php echo $row['nm_kelompok_barang']; ?></option>
                             <?php } ?>
                        </select>
                      </div></div></div>
              

        <div class="col-md-3">
        <div class="form-group">
        <label>  Jenis Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="id_jenis" class="form-control">
                        <option selected disabled>-- JENIS BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                                <option value="<?php echo $row['id_jenis']; ?>"> <?php echo $row['nm_jns_brg']; ?></option>
                             <?php } ?>
                        </select>
                      </div>
                  </div></div>

            <div class="col-md-2">
                <br/>
                <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
           </div>
      </div>
    <br/><br/>
  </div>
</form>
</div>

<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:green;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>Kelompok Barang</th>
                                             <th>Jumlah</th>
                                        </tr>
                                <tbody>
                               <?php
                                 $nomor=1;
                                 while($db=$result->fetch_assoc()){
                                ?>

                                               <tr>
                                                   <td><?php echo $nomor++; ?></td>
                                                   <td><?php echo $db['nm_kelompok_barang'];?></td>
                                                   <td><?php echo $db['jumlah'];?></td>
                                          
                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                        <tfoot>
              <tr>
                <th colspan="2">Total</th>
                <th><?php echo number_format($nomor-1)?></th>
              </tr>
            </tfoot>

                                    </thead>
                                </table>