<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<!-- Start Header Area -->
	<?php include ("asset/navbar.php"); ?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Masuk Di Sini Sebagai Pemilik Usaha Franchise</h4>
							<p>Halaman Ini Di Peruntukan untuk pemilik usaha yang ingin mendaftarkan usaha nya di sini secara gratis, agar bisa kami tampilkan pada halaman kami. Tekan tombol daftar jika belum punya akun</p>
							<a class="primary-btn" href="daftar_frn.php">Daftar</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<div class="col-md-12 form-group">
								
							</div>
						<form class="row login_form" method="post">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="name" placeholder="Username"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password" placeholder="Password"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button name="login" class="primary-btn">Log In</button>
							</div>
						</form>
						<?php
							if(isset($_POST['login'])){
								$name = $_POST['name'];
								$pass = $_POST['password'];
								include 'admin/components/koneksi.php';
								$ambil = $koneksi->query("SELECT * FROM tb_frn WHERE frn_username = '$name' AND frn_password = '$pass' ");
								$cek = $ambil->num_rows;

								if($cek > 0){									
									$akun=$ambil->fetch_object();
									$_SESSION['frn'] = $akun;
									echo "<script>
									window.location='tambah.php';
									</script>";
								}
								else{
									echo "<script>
									alert('password dan username tidak sesuai');
									window.location='franchisor.php';
									</script>";
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	<?php include ("asset/footer.php"); ?>	
	<!-- End footer Area -->
</body>

</html>