<section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 no-padding exclusive-left">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Brand Teratas di halaman kami</h1>
							<p>Brikut bebrapa Brand Teratas yang Kami Sediakan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 no-padding exclusive-right">
					<div class="active-exclusive-product-slider">
						<!-- single exclusive carousel -->
						<?php 
							include 'admin/components/koneksi.php';
							$data=$koneksi->query("SELECT * FROM tb_info LEFT JOIN tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id LIMIT 3");
                            while($isi=$data->fetch_object()){ ?>
                        <div class="single-exclusive-slider">
							<img class="img-fluid" style="height:150px" src="admin/asset/gambar/<?php echo $isi->info_gambar ?>">
							<div class="product-details">
								<div class="price">
									<h6>Rp <?php echo $isi->info_modal ?></h6>
								</div>
								<p><?php echo $isi->kategori_nama ?></p>
								<h4><?php echo $isi->info_merk ?></h4>
							</div>
							<div class="login_form">
								<button name="save" class="primary-btn">Daftar</button>
							</div>
                        </div>
                        <?php
                            }?>						
					</div>
				</div>
			</div>
		</div>
	</section>