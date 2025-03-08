<?php
session_start ();
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

$koneksi=new mysqli("localhost", "root", "", "agrishop");
$kota_penjual = $_GET['nm_kota'];
$kota_tujuan=$_SESSION["pembeli"]['id_kota_tujuan'];

?>
<?php include 'header.php' ?>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              DAFTAR PENGIRIMAN
            </div>
            <div class="card-body">
            <div class="col-md-8"> 
                <?php $noj=$_GET['no'];
                $no=1; ?>
                <?php $nop=0;$ongkir=[]; ?>
                <?php $totalpesanan=0; $totalbarang=0; $totalbelanja=0; ?>
                <?php $totalkeseluruhan = 0; ?>
             <?php $ambil1=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman 
            JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori 
            JOIN kota ON daftar_pengiriman.id_kota_asal=kota.id_kota WHERE nm_kota= '$kota_penjual'");
            $ambil3=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_Pengiriman 
            JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori 
            JOIN kota ON daftar_pengiriman.id_kota_asal=kota.id_kota ");
                    $ambil2=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kota ON daftar_pengiriman.id_kota_tujuan =kota.id_kota 
                    WHERE id_kota_tujuan='$kota_tujuan'  ")?>
                <div class='row'>
                    <?php while ($pecah=$ambil1->fetch_assoc() AND $pecah1=$ambil3->fetch_assoc() and $pecah1=$ambil2->fetch_assoc()) { ?>
                    <div class="col-md-12">
                    <ul class='thumbnails'>
                    <div class="card mb-12 product-wap rounded-0">
                    <div class="card rounded-0">
                        <h6> 
                           Dari <?php echo  $pecah['nm_kota']?> ke <?php echo $pecah1['nm_kota']?> 
                           ( <?php echo $pecah['nm_kategori']?>-<?php echo $pecah['nm_jasa_kirim']?> <?php echo $pecah['nm_sistem_pengiriman']?>) Rp. <?php echo $pecah['tarif_pengiriman']?> </h6>  

                                <a class="btn btn-success text-white mt-2" name="tarif_pengiriman" href ="checkoutt.php?tarif_pengiriman=<?php echo $pecah['tarif_pengiriman']; ?>&id_daftar_pengiriman=<?php echo $pecah['id_daftar_pengiriman']; ?>&no=<?php echo $noj?>"><i class="fas fa-check"></i></a><th> </th>
                            </ul>
                        </div>
                    </div>
                    </div>
                    </ul>
                    </div>
                
                    <?php }  ;?></div>