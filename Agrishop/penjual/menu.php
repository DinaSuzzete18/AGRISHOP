 <div class="content">
     <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                     <div class="card-header ">
                        <h4 class="card-title"> NAMA NAMA BANK </h4>
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th> Id Barang </th>
                                <th> Nama Barang</th>
                                <th> AKSI </th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $nomor=1; ?>
                                <?php 
                                    include('conf/config.php');
                                    $ambil=$koneksi->query("SELECT * FROM bank"); ?>
                                    <?php while ($pecah=$ambil->fetch_assoc()){ ?>
                                    <tr>
                                    <td> <?php echo $nomor?> </td>
                                    <td> <?php echo $pecah['id_bank']?> </td>
                                    <td> <?php echo $pecah['nm_bank']?> </td>
                                    <td>
                                    <a href="menu.php?halaman=hapus_bank&id_bank=<?php echo $pecah['id_bank']; ?>" 
                                    class="btn-danger btn"> Hapus </a>
                                    <a href="menu.php?halaman=ubah_bank&id_bank=<?php echo $pecah['id_bank']; ?>" 
                                    class="btn-warning btn"> Ubah </a>
                                    </td>
                                    </tr>
                                <?php $nomor++; ?>
                                <?php } ?>
                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
                <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>
</html>