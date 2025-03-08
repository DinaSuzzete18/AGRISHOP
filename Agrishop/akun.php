
<?php
session_start();
//echo "<pre>";
//echo  print_r($_SESSION);
//echo "</pre>";
include "koneksi.php";
if(!isset($_SESSION['pembeli']))
    {
        
    }

    //mendapatkan kode faktur dari url
    $ambil = $koneksi->query("SELECT * FROM pembeli  JOIN  jenis_pembeli ON pembeli.id_jenis_pembeli =jenis_pembeli.id_jenis_pembeli ");
    $detpem = $ambil->fetch_assoc();

    //medapatkan id pembeli
    $id_cus = $detpem["id_pembeli"];
    //mendapatka id yg login
    $id_log = $_SESSION["pembeli"]["id_pembeli"];

    if ($id_log !== $id_cus) 
    {
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>AGRISHOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/Logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Logo.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>
<?php include "header.php" ?>

<body>
    <section class="container py-1">
        <div class="col-lg-12 m-auto">
            <div class="row text-center pt-5">
                <h1 class="text-success h1"><strong>PROFIL AKUN</h1></strong>
                <center> <img src="admin/photo/profil.png" width="100"></center>
                <br> <br> <br>
            </div>
        </div>
        <center>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Loyality Pengguna</th>
                        <td> <?php echo $detpem['nm_jenis_pembeli'] ?> Account</td>
                    </tr>

                    <tr>
                        <th>ID Pembeli</th>
                        <td><?php echo $_SESSION["pembeli"]["id_pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>Username Pembeli</th>
                        <td><?php echo $_SESSION["pembeli"]["usser_pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>Nama Pembeli</th>
                        <td><?php echo $_SESSION["pembeli"]['nm_pembeli']?></td>
                    </tr>

                    <tr>
                        <th>Alamat Pembeli</th>
                        <td><?php echo $_SESSION["pembeli"]["almt_pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>Password Pembeli</th>
                        <td><?php echo $_SESSION["pembeli"]["pw_pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>No Rekening Pembeli</th>
                        <td><?php echo $_SESSION["pembeli"]["no_rek_pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>No Handhpone Pembeli</th>
                        <td><?php echo $_SESSION["pembeli"]["no_hp_pembeli"]; ?></td>
                    </tr>

                </table>
                </br>
            </div>
        </center>
            <br>
            <td> 
             <a href ="akun_edit.php?halaman=edit_akun&id_pembeli=<?php echo $detpem['id_pembeli']?>" class="btn btn- btn-info">Edit Profil</a>
         </td>
        </div>
    </div>
</section>
</body>
<br>
<?php include "footer.php" ?>
</html>