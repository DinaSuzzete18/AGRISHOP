<?php
session_start();
include ('koneksi.php');

if(!isset($_SESSION["pembeli"]))
{
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
}
include('koneksi.php');
?>

<body>
<?php include 'header.php' ?>
    <main>
        <section class="featured-places"> 
            <div class="container">
                <div class="row"> 
                    <?php $ambil=$koneksi->query("SELECT * FROM diskon WHERE id_diskon!='IDKOSN001'");
                    while($pecah = $ambil->fetch_assoc()){?>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="featured-item">
                            <div class="down-content">
                                <?php  
                                $tgl_muncul=$pecah['tgl_muncul'];
                                if (date("Y-m-d") == $tgl_muncul ) { ?>
                                <br>
                                
                                <h2><strong><center><?php echo $pecah['nm_diskon'];?></center></strong></h2>
                                <h2><span><center><strong><?php echo number_format($pecah['hrg_diskon']);?>%</strong></center></span></h2>
                                <div class='form-actions'>
                                    <center><a href="prosesdiskon.php?id_diskon=<?php echo $pecah['id_diskon'];?>" class="btn btn-primary btn-xs"><h5>Klaim</h5></a><center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                </div>
            </div>
        </section>
        </body>
        <br><br>
    <!-- Start Footer -->
    <?php include 'footer.php' ?>
</html>