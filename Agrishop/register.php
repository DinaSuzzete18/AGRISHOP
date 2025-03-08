<?php
    // https://www.malasngoding.com
    // menghubungkan dengan koneksi database
    session_start();
    $koneksi=new mysqli("localhost", "root", "", "agrishop");
 
    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(id_pembeli) as kodeTerbesar FROM pembeli");
    $data = mysqli_fetch_array($query);
    $id_pembeli = $data['kodeTerbesar'];
 
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan=0;
    $urutan = (int) substr($id_pembeli, 3, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "PBL";
    $huruf2= "Agri";
    $id_pembeli = $huruf . sprintf("%03s", $urutan) . $huruf2;
    echo $id_pembeli;
    $id_jenis_pembeli="1B1";
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
    <link rel="stylesheet" href="fonts/material-icon/penjual/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="penjual/css1/style.css">
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
                                <label for="username_admin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nm_pembeli" id="username_admin" placeholder="Nama User Akun Anda" required />
                            </div>  
                            <div class="form-group">
                                <label for="username_admin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="almt_pembeli" id="username_admin" placeholder="Alamat" required/>
                            </div>
                            <div class="form-group">
                                <label for="username_admin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="no_hp_pembeli" id="username_admin" placeholder="No Handphone" required/>
                            </div>
                            <div class="form-group">
                                <label for="username_admin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="usser_pembeli" id="username_admin" placeholder="Nama User Akun Anda" required/>
                            </div>
                            <div class="form-group">
                                <label for="password_admin"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pw_pembeli" id="password_admin" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="username_admin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="no_rek_pembeli" id="username_admin" placeholder="No Rekening" required/>
                            </div>
                    
                            <div class="form-group">
                            <button name="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="penjual/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
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
    
    if(isset($_POST['submit']))
    {
        $pembeli=$_SESSION["pembeli"]["id_pembeli"];

        $koneksi->query("INSERT INTO pembeli (id_pembeli, id_jenis_pembeli, nm_pembeli, pw_pembeli, usser_pembeli, almt_pembeli, no_hp_pembeli, no_rek_pembeli) 
        VALUES ('$id_pembeli', '$id_jenis_pembeli', '$_POST[nm_pembeli]', '$_POST[pw_pembeli]','$_POST[usser_pembeli]',
            '$_POST[almt_pembeli]', '$_POST[no_hp_pembeli]', '$_POST[no_rek_pembeli]' )");
        echo "<script>alert('Register Berhasil');</script>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }

?>
</html>