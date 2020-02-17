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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/main.css">
	<style>
		.center {
		margin: 0;
		position: absolute;
		top: 50%;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		}
	</style>

</head>

<body>

	<!-- Start Header Area -->
	<?php
		include 'asset/navbar.php';
		?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<?php
		include 'admin/components/koneksi.php';
		$id = $_GET['id'];
		$data=$koneksi->query("SELECT * FROM tb_info LEFT JOIN tb_frn ON tb_info.frn_id=tb_frn.frn_id LEFT JOIN tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id WHERE info_id=$id");
		$isi=$data->fetch_object();
	?>
	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<img style="width:100%" class="center" src="admin/asset/gambar/<?php echo $isi->info_gambar ?>" alt="">			
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $isi->info_merk ?></h3>
						<h2>Rp <?php echo $isi->info_modal ?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : <?php echo $isi->kategori_nama ?></a></li>
						</ul>
						<h6><?php echo $isi->info_keterangan ?></h6>						
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="kontak.php">Hubungi</a>
						</div>
					</div>
				</div>
				<!-- Abaikan div ini start -->
				<div><table height="80px"><tr><td></td></tr></table></div>
				<!-- div yang di abaikan end -->
				<div class="col-lg-12">
					<img src="admin/asset/gambar/<?php echo $isi->info_gambar ?>" style="width:100%">
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->



	<!-- start footer Area -->
	<?php
		include 'asset/footer.php';
		?>

</body>

</html>