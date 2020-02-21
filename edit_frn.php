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
	<link rel="stylesheet" href="css/style.css">
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
							<h4>Halaman daftar Sebagai member atau investor</h4>
							<p>Daftar kan akun anda di sini untuk mendapatkan kontak dari waralaba yang anda cari</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
                        <?php
                            include 'admin/components/koneksi.php';
                            $id = $_GET['id'];
                            
                            $ambil = $koneksi->query("SELECT * FROM tb_frn WHERE frn_id= $id");
                            $data = $ambil-> fetch_object();
                        ?>
						<h3>Daftar Investor/Member</h3>
						<form class="row login_form" method="post" enctype="multipart/form-data">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="name" value="<?php echo $data->frn_nama; ?>" readonly placeholder="Nama"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'">
                            </div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="username" value="<?php echo $data->frn_username; ?>" placeholder="Username"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password" value="<?php echo $data->frn_password; ?>" placeholder="Password"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" name="telpon" value="<?php echo $data->frn_telpon; ?>" placeholder="telpon"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'telpon'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" name="email" value="<?php echo $data->frn_email; ?>" placeholder="email"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" name="web" value="<?php echo $data->frn_web; ?>" placeholder="web"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'web'">
							</div>	
							<div class="col-md-12 form-group">
							<label class="pull-left" style="padding-left:9px">Foto User</label><br>	
							    <label class="file">																
                                    <input class="form-control" type="file" name="gambar" aria-label="File browser example">
                                    <span class="file-custom"></span>
                                </label>  
                                <img src="admin/asset/gambar/<?php echo $data->frn_gambar ?>" height="100px" alt="">                     
							</div>   
							
                            <div class="col-md-12 form-group">                                
								<button name="save" class="primary-btn">Edit</button>
							</div>
                        </form>
                        <?php
                                    if(isset($_POST['save'])){

                                        $nama_gambar = $_FILES['gambar']['name'];
                                        $lokasi = $_FILES['gambar']['tmp_name'];

                                        
                                        $pecahgambar = explode(".",$nama_gambar);
                                        $gambarniq = $pecahgambar[0]=uniqid().".".$pecahgambar[1];
                                        move_uploaded_file($lokasi, "admin/asset/gambar/$gambarniq");

                                        if(empty($nama_gambar)){
                                            $gambarniq=$data->frn_gambar;
                                        }

                                        $nama = $_POST['name'];
                                        $username = $_POST['username'];
                                        $pass = $_POST['password'];
                                        $telpon = $_POST['telpon'];
                                        $email = $_POST['email'];
                                        $web = $_POST['web'];


                                        // echo "UPDATE tb_frn SET frn_nama = '$nama', frn_username = '$username', frn_password='$pass', frn_telpon='$telpon', frn_email='$email', frn_web='$web', frn_gambar='$gambarniq' WHERE frn_id = '$id'";
                                        // exit;

                                        $koneksi->query("UPDATE tb_frn SET frn_nama = '$nama', frn_username = '$username', frn_password='$pass', frn_telpon='$telpon', frn_email='$email', frn_web='$web', frn_gambar='$gambarniq' WHERE frn_id = '$id'");

                                        echo"
                                        <script>window.location='tabel.php'</script>";
                                        
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