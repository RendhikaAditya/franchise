<section class="category-area">
	<div class="container">
		<div class="row " style="margin-bottom: 10px">
			<div class="col-md-12">
				<h1>Kategori</h1>
				<br>
			</div>
				<?php 
					include 'admin/components/koneksi.php';
					$data=$koneksi->query("SELECT * FROM tb_kategori");
					$no=1;
					while($isi=$data->fetch_object()){ ?>	
							<div class="col-md-auto">
								<div class="mx-auto single-deal">
									<a href="waralabaid.php?id=<?php echo $isi->kategori_id ?>" >
										<table class=" rounded features-inner" style="background-color: white; box-shadow: #ccc; width:100%" width="100%" >
											<tr>
												<td><p style="color:#000; font-size:15px;  margin:15px 	"><?php echo $isi->kategori_nama ?></p></td>
											</tr>
										</table>
										<div class="overlay"></div>
											<div class="deal-details">
												<h6 class="deal-title"><?php echo $isi->kategori_nama ?></h6>
											</div>
									</a>								
								</div>		
							</div>
					<?php } ?>
			<div class="col-md-12"><br></div>
		</div>
	</div>
</section>