<?php
include 'koneksi.php';
$id_kota="";
$id_jenis="";
$id_kelompok_barang="";
$strq="";
$strw="";
$jmlh=0;

if (isset($_POST['id_kota']))
{
    $id_kota=$_POST['id_kota'];
    $strc[]="penjual.kota='$id_kota'";
    $jmlh++;
}
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
$query="SELECT nm_jns_brg,nm_barang, count(barang.id_penjual) 
AS jumlah FROM barang JOIN kelompok_barang ON barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN penjual ON barang.id_penjual=penjual.id_penjual
JOIN jenis_barang ON kelompok_barang.id_jenis=jenis_barang.id_jenis $strw GROUP BY kelompok_barang.id_jenis";
$query1="SELECT nm_kelompok_barang, count(barang.id_penjual) 
AS jumlah FROM barang JOIN kelompok_barang ON barang.id_kelompok_barang=kelompok_barang.id_kelompok_barang JOIN penjual ON barang.id_penjual=penjual.id_penjual
JOIN jenis_barang ON kelompok_barang.id_jenis=jenis_barang.id_jenis $strw GROUP BY kelompok_barang.id_jenis";

$result=mysqli_query($koneksi, $query);
$resnum=mysqli_num_rows($result);  
$result1=mysqli_query($koneksi, $query1);
$resnum1=mysqli_num_rows($result1);                 
$pecah2=$koneksi->query("SELECT * From kota");                                 
?>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="table/css/style.css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN DATA PENJUAL BERDASARKAN JUMLAH PENJUAL </h5></center>
    </div>
    </ol>
</div>
<form action="index.php?halaman=laporan_data_penjual_jumlah" method="post" class="form">
    <input type="radio" name="rekap1" value="kelompok"/> Kelompok Barang
    <input type="radio" name="rekap2" value="jenis"/> Jenis Barang
    <input type="radio" name="rekap" value="kelompok"/> Barang
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Kota :</label>
                <select class="form-control" name="id_kota">
                    <option selected disabled>-- PILIH KOTA -- </option>
                    <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['id_kota']; ?>"> <?php echo $row['nm_kota']; $kota=$row['nm_kota']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div>
    </div>
</form>
<h2>
  <div class="card-body">
    <div class="table-wrap">
        <table class="table">
                <?php
                 if (isset ( $_POST['submit']) and isset($_POST['rekap1']))
                 { ?>
                    <thead class="thead-primary">
                <tr>
                    <th><p style="text-align: center ; color:#000000">No</th>
                    <th><p style="text-align: center ; color:#000000">Kelompok</th>
                    <th><p style="text-align: center ; color:#000000">Jumlah Penjual</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php $nomor=1;
                     $total=0;
                    while($db1=$result1->fetch_assoc()){ ?>
                        <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $db1['nm_kelompok_barang'];?></td>
                        <td><?php echo $db1['jumlah'];?></td>
                        </tr>
                        </tr>
                
                    <?php }  ?>
                 <?php }
                 else if (isset ( $_POST['submit']) and isset($_POST['rekap2']))
                 { ?>
                    <thead class="thead-primary">
                <tr>
                    <th><p style="text-align: center ; color:#000000">No</th>
                    <th><p style="text-align: center ; color:#000000">Jenis</th>
                    <th><p style="text-align: center ; color:#000000">Jumlah Penjual</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php $nomor=1;
                     $total=0;
                    while($db=$result->fetch_assoc()){ ?>
                        <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $db['nm_jns_brg'];?></td>
                        <td><?php echo $db['jumlah'];?></td>
                        </tr>
                        </tr>
                
                    <?php }  ?>
                 <?php }
                 else if (isset ( $_POST['submit']) and isset($_POST['rekap']))
                 { ?>
                    <thead class="thead-primary">
                <tr>
                    <th><p style="text-align: center ; color:#000000">No</th>
                    <th><p style="text-align: center ; color:#000000">Barang</th>
                    <th><p style="text-align: center ; color:#000000">Jumlah Penjual</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php $nomor=1;
                     $total=0;
                    while($db=$result->fetch_assoc()){ ?>
                        <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $db['nm_barang'];?></td>
                        <td><?php echo $db['jumlah'];?></td>
                        </tr>
                        </tr>
                
                    <?php }  ?>
                 <?php }

                 else
                 { ?>
                <thead class="thead-primary">
                <tr>
                  <th scope="col"><p style="text-align: center ; color:#000000">KOTA</p></th>
                  <th scope="col"><p style="text-align: center ; color:#000000">Jumlah</p> </th>                
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                    $i=0;
                $query1 = mysqli_query($koneksi,"SELECT * FROM kota ");
                $persen= mysqli_num_rows ($query1);
                $sql = "SELECT * FROM kota";
                $query = mysqli_query($koneksi, $sql);
                
                while($data = mysqli_fetch_array($query)){ 
                  echo" <td> $data[nm_kota] </td>";
                  $total=0;
                  $kp = $data["id_kota"];
                  $sql2 = "SELECT * FROM penjual";
                  $query2 = mysqli_query($koneksi, $sql2);
                  $data2=mysqli_fetch_array($query2);
                      $st=$data2["kota"];
                    $n = mysqli_query ($koneksi, "SELECT * FROM penjual where kota='$kp' "); 
                    $jn = mysqli_num_rows ($n);  
                    echo" <td> $jn </td>";
                    $total=$total+$jn;
                echo "</tr>";
                 }
                 }
                ?>
            </tr></tbody></table></div>  
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>