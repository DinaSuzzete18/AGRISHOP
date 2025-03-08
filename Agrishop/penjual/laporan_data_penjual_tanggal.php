<?php
include 'koneksi.php';
$id_kota="";
$strq="";
$strw="";
$jmlh=0;
$tgl_mulai="";
$tgl_selesai="";


if (isset($_POST['tgl_mulai']))
{
    $tgl_mulai=$_POST['tgl_mulai'];
} 
if (isset($_POST['tgl_selesai']))
{
    $tgl_selesai=$_POST['tgl_selesai'];
} 
if (isset($_POST['id_kota']))
{
    $id_kota=$_POST['id_kota'];
    $strc[]="penjual.kota='$id_kota'";
    $jmlh++;
}
if (isset($_POST['keyword']))
{
    $nama_penjual=$_POST['keyword'];
    $strc[]="penjual.nm_pen LIKE '%$nama_penjual%'";
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
$query="SELECT * FROM penjual inner join kota on penjual.kota=kota.id_kota $strw AND tanggal_daftar BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                   
$pecah2=$koneksi->query("SELECT * From kota");                                  
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN DATA PENJUAL BERDASARKAN TANGGAL</h5></center>
                        </div>
                        </ol>
</p> 

<form action="index.php?halaman=laporan_data_penjual_tanggal" method="post" class="form">
    <br/>
    
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai?>" required >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai?>" required >
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Kota :</label>
                <select class="form-control" name="id_kota">
                    <option selected disabled>-- PILIH KOTA -- </option>
                    <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_kota']; ?>"> <?php echo $row['nm_kota']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div>
    </div>
    <br/><br/>
</form>
<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:black;">
    <thead>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Nama Penjual</th>
            <th>Kota Penjual </th>
    </thead>
    <tbody>
        <?php
        $nomor=1;
        while($perproduk=$result->fetch_assoc()){
            ?>
            <tr>
                <th><?php echo $nomor++; ?></th>
                <th><?php echo $perproduk['tanggal_daftar']; ?></th>
                <th><?php echo $perproduk['nm_pen']; ?></th>
                <th><?php echo $perproduk['nm_kota']; ?></th>
            </tr>
        <?php } ?>
    </tbody>
</table>