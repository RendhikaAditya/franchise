<!-- <section class="category-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h1>Kategori</h1>
				<br>
			</div>

			<div class="col-md-12">
				<div class="row">
				
					<div class="col-md-3" >
						<div class="mx-auto single-deal">
						<a href="waralabaid.php?id=<?php echo $isi->kategori_id ?>" >
							<table class="rounded font" width='100%' height='100px'>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td height='10px'></td>
									<td>
										<center><p class="f" style="color:#fff; font-family:onagri; font-size:40px; margin-top:20px"><?php echo $isi->kategori_nama ?></p></center>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
							<div class="overlay"></div>
								<div class="deal-details">
									<h6 class="deal-title"><?php echo $isi->kategori_nama ?></h6>
								</div>
							</a>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-12"><br></div>
		</div>
	</div>
</section> -->

<section class="">
		<!-- single product slide -->
		<div class="">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
						</div>
					</div>
				</div>
				<div class="row">
				<?php 
							include "admin/components/koneksi.php";
							$data=$koneksi->query("SELECT * FROM `tb_info` LEFT JOIn tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id LEFT JOIN tb_frn ON tb_info.frn_id=tb_frn.frn_id LIMIT 8");
							while($isi=$data->fetch_object()){
						?>
						<div class="col-lg-3 col-md-6" >
							<div class="single-product features-inner" style=" padding-left: 20px; padding-right: 20px">
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
				<div class="row justify-content-center">
					<div class="col-lg-12 text-right">
						<div class="section-title">
							<h6><a href="waralaba.php" style="color:orangered">Lihat Semua</a></h6>
						</div>
					</div>
				</div>
		</div>

	</section>

