<section class="brand-area section_gap">
		<div class="container">
			<div class="row">
				<?php
					include "admin/components/koneksi.php";
					$data=$koneksi->query("SELECT * FROM tb_info");
					while($isi=$data->fetch_object()){ ?>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" style="height:80px; " src="admin/asset/gambar/<?php echo $isi->info_gambar ?>" alt="">
				</a>
					<?php } ?>
			</div>
		</div>
	</section>