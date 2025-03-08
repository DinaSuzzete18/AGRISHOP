<?php
include 'conf/config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AGRISHOP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css1/style.css">
</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registrasi Akun Anda</h2>
                        <form method="POST">
                           <div class="form-group">
                                <label for="nm_pen"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nm_pen" id="nm_pen" placeholder="Nama Lengkap"/>
                            </div>
                            <div class="form-group">
                                <label for="alamat_pen"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="alamat_pen" id="alamat_pen" placeholder="Alamat Anda"/>
                            </div>
                            <div class="form-group">
                                <label for="no_hp_pen"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="no_hp_pen" id="no_hp_pen" placeholder="No HP"/>
                            </div>
                            <div class="form-group">
                                <label for="username_penjual"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username_penjual" id="username_penjual" placeholder="Nama User Akun Anda"/>
                            </div>
                            <div class="form-group">
                                <label for="pass_penjual"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="pass_penjual" id="pass_penjual" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="no_rek_penjual"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="no_rek_penjual" id="no_rek_penjual" placeholder="No Rekening Anda"/>
                            </div>
                                <tr>
                                    <td> BANK </td>
                                    <td><select name= "bank">
                                        <option>----</option>
                                        <?php
                                        
                                        $query= mysqli_query($koneksi, "SELECT * FROM bank");
                                        while ($data= mysqli_fetch_array($query)){
                                            echo "<option value=$data[id_bank]> $data[nm_bank] </option>";
                                        }
                                        ?>
                                    </select>       
                                    </td>
                                </tr>
                            <div class="form-group form-button">
                                <input href="login.php" type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<?php

    if(isset($_POST['signup'])){
        
        mysqli_query($koneksi, "INSERT INTO penjual SET 
            id_bank='$_POST[$bank]',
            nm_pen ='$_POST[nm_pen]',
            alamat_pen ='$_POST[alamat_pen]',
            no_hp_pen = '$_POST[no_hp_pen]',
            username_penjual = '$_POST[username_penjual]',
            pass_penjual = '$_POST[pass_penjual]',
            no_rek_penjual ='$_POST[no_rek_penjual]' ");
        echo "DATA BARU BERHASIL DISIMPAN";
    }

?>
</html>