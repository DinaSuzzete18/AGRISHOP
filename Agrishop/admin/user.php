<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Nama Akun" name="username_penjual">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">NO HP</label>
                                                <input type="text" class="form-control" placeholder="Nomor Handphone" name="no_hp_pen">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nm_pen">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" placeholder="Home Address" name="alamat_pen">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group"> Bank
                                        <select name="bank">
                                            <option>Pilih
                                    <?php
                                    include "conf/config.php";
                                    $query= mysqli_query($koneksi, "SELECT * FROM bank");
                                    while ($data= mysqli_fetch_array($query)){
                                        echo "<option value=$data[id_bank]> $data[nm_bank] </option>";
                                    }
                                    ?>
                                            
                                        </option></select></div></div></div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://cdn.pixabay.com/photo/2016/11/14/03/48/father-1822528_960_720.jpg"  height="300" width="300" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="images/padi.jpg" alt="..."/>

                                      <h4 class="title"><br />
                                         <small></small>
                                      </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
$ambil=$koneksi->query("SELECT * FROM penjual WHERE id_penjual='$_GET[id_penjual]'");
$pecah=$ambil->fetch_assoc ();

?>