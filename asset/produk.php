
	<div class="container">
		<div class="row">			
			<div class="col-xl-12 col-lg-12 col-md-12">
				<!-- Start Filter Bar -->
				<!-- <div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
						</select>
					</div>
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
						</select>
					</div>
					<div class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div> -->
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
					<p style="font-size:45px; font-family:Tahoma, Geneva, sans-serif;">Daftar Brand Waralaba</p>
				</div>
			</div>
		</div>
	</div>				
				<div class="col-sm-12 align-items-center d-flex justify-content-center input-group mb-3" style="margin-top:20px; height: 60px; background-color:#f0f0f0">
					<table width='80%' height='40%'>
						<tr>
							<td style="color: grey; font-size: 20px">Urutkan</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td style="width: 200px">
							<form method="POST">
								<div class="input-group">
									<select class="custom-select" id="inputGroupSelect02" name="harga" aria-label="Example select with button addon">
										<option selected>Harga</option>
										<option value="1">Harga ⬆</option>
										<option value="2">Harga ⬇</option>
									</select>
									<div class="input-group-append">
										<button class="btn btn-default" name="short">Short</button>
									</div>
								</div>
								<!-- <button name="short"></button> -->
							</form>
								<?php 
									include "admin/components/koneksi.php";
									$data=$koneksi->query("SELECT * FROM `tb_info` LEFT JOIn tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id LEFT JOIN tb_frn ON tb_info.frn_id=tb_frn.frn_id");	
									if(isset($_POST['short'])){
										$harga=$_POST['harga'];
											if($harga==1){
												$data=$koneksi->query("SELECT * FROM `tb_info` LEFT JOIn tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id LEFT JOIN tb_frn ON tb_info.frn_id=tb_frn.frn_id ORDER BY info_modal DESC");
											}elseif($harga==2){
												$data=$koneksi->query("SELECT * FROM `tb_info` LEFT JOIn tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id LEFT JOIN tb_frn ON tb_info.frn_id=tb_frn.frn_id ORDER BY info_modal ASC");
											}else {
												$data=$koneksi->query("SELECT * FROM `tb_info` LEFT JOIn tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id LEFT JOIN tb_frn ON tb_info.frn_id=tb_frn.frn_id ");
											}
										}
									
								?>
								
								<!-- <form action="" method="POST">
									<div class="input-group">
										<select class="form-control custom-select" name="harga">
											<option selected>Harga</option>
											<option value="1">Harga ⬆</option>
											<option value="2">Harga ⬇</option>
										</select>
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" name="short" type="button">Button</button>
										</div>
									</div>									
								</form> -->
							</td>
						</tr>
					</table>
				</div>
	<div class="container">
		<div class="row">			
			<div class="col-xl-12 col-lg-12 col-md-12">										
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						<?php 
							while($isi=$data->fetch_object()){
						?>
						<div class="col-lg-4 col-md-6" >
							<div class="single-product features-inner" style="padding:25px ">
								<img class="img-fluid" style="height:180px" src="admin/asset/gambar/<?php echo $isi->frn_gambar ?>" alt="">
								<div class="product-details" >
									<h6><?php echo $isi->info_merk; ?></h6>
									<p><?php echo $isi->kategori_nama; ?></p>
									
										
									<div class="prd-bottom">
										<h6>Rp <?php echo $isi->info_modal; ?></h6>
									</div>
									<div class="container">
										<div class="col-md-12">
											<a href="detail.php?id=<?php echo $isi->info_id ?>" class="btn rounded primary-btn" style="width:100%">detail</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>					
						<?php } ?>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<!-- <div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div> -->
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>