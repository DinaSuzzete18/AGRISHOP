
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
                                <label for="username_admin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username_admin" id="username_admin" placeholder="Nama User Akun Anda"/>
                            </div>
                            <div class="form-group">
                                <label for="password_admin"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_admin" id="password_admin" placeholder="Password"/>
                            </div>
                            <div class="form-group">
	            			<button name="submit" class="btn btn-primary">Sign In</button>
	           				</div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
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
	include('conf/config.php');
    if(isset($_POST['submit']))
    {
        
        $koneksi->query("INSERT INTO admin (username_admin, password_admin) 
	VALUES ('$_POST[username_admin]', '$_POST[password_admin]')");
        echo "<script>alert('Register Berhasil');</script>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }

?>
</html>