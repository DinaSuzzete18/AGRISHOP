<?php
session_start();
$koneksi=new mysqli("localhost", "root", "", "agrishop");
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>AGRISHOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/penjual/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="penjual/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(penjual/images/padi.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">AGRISHOP</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center"> Akun Agrishop </h3>
		      	<form role="form" class="signin-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name=usser_pembeli placeholder="Akun Anda">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name=pw_pembeli placeholder="Password"> 
	            </div>
	            <div class="form-group">
	            	<button name="login" class="btn btn-primary">Sign In</button>
	            </div>
	            <?php
	            	if(isset($_POST['login']))
	            	{ 
	            		$username=$_POST['usser_pembeli'];
                 	$password=$_POST['pw_pembeli'];
	            		$ambil = $koneksi -> query("SELECT * FROM pembeli WHERE usser_pembeli='$_POST[usser_pembeli]' AND pw_pembeli='$_POST[pw_pembeli]'");
	            		$cocok=mysqli_num_rows($ambil);
	            		if($cocok==1)
	            		{
	            			$akun=$ambil->fetch_assoc();
	            			$_SESSION['pembeli'] = $akun;
	            				echo "<script>alert('Login Sukses');</script>";
	            			//Jika Ada Isi Keranjang Pembelian akan menuju keranjang dan jika tidak menuju index
	            			if(isset($_SESSION['pembeli']) OR !empty($_SESSION['keranjang']))
											{
												echo "<meta http-equiv='refresh' content='1;url=shop.php'>"; 
											} 
	            			else 
											{
												echo "<meta http-equiv='refresh' content='1;url=index.php'>";
											}
	            		}
	            		else
	            		{
	            			echo "<div class='alert alert-denger'>Login Gagal </div>";
	            			echo "<meta http-equiv='refresh' content='1;url=login.php'>";
	            		}
	            	}

	            ?>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	         <form  method="POST" action="register.php"> Belum punya akun?
	          <a type="submit" href="register.php" class="signup-image-link">Register disnini</a>
	          <center><a href="registrasi.php"><h6> Registrasi  </h6></a></center>
								<br>
								<div class="text-center">
                   <a class="btn btn-warning" class="small" href="penjual/login.php">Mulai sebagai Penjual</a>
                </div> <br>
                <div class="text-center">
                	<a class="btn btn-warning" class="small" href="admin/login.php">Masuk sebagai Admin</a>
                </div>
	        </form>
		      </div>
				</div>
			</div>
			<a align="center"><i class="heading-section"><marquee>Belanja Sembako Lebih Mudah Hanya di Agrishop</marquee></p></i>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

