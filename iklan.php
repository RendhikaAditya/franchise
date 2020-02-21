<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
                <?php 
                    include 'admin/components/koneksi.php';
                ?>
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
                                    <table>
                                        <tr>
                                            <td style="width: 480px; height: 215px">
                                                <img class="img-fluid w-100 h-100" src="admin/asset/gambar/<?php 
                                                            $isi=$koneksi->query("SELECT * FROM tb_iklan WHERE iklan_id=4");
                                                            $data=$isi->fetch_object();  
                                                            echo $data->iklan_gambar ?>" alt="">
                                                <a href="#">
                                                    <div class="deal-details">
                                                        <h6 class="deal-title"><?php echo $data->iklan_nama ?></h6>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								    <table>
                                        <tr>
                                            <td style="width: 265px; height: 215px">
                                                <img class="img-fluid w-100 h-100" src="admin/asset/gambar/<?php 
                                                            $isi=$koneksi->query("SELECT * FROM tb_iklan WHERE iklan_id=5");
                                                            $data=$isi->fetch_object();  
                                                            echo $data->iklan_gambar ?>" alt="">
                                                <a href="#">
                                                    <div class="deal-details">
                                                        <h6 class="deal-title"><?php echo $data->iklan_nama ?></h6>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
                                    <table>
                                        <tr>
                                            <td style="width: 265px; height: 215px">
                                                <img class="img-fluid w-100 h-100" src="admin/asset/gambar/<?php 
                                                            $isi=$koneksi->query("SELECT * FROM tb_iklan WHERE iklan_id=6");
                                                            $data=$isi->fetch_object();  
                                                            echo $data->iklan_gambar ?>" alt="">
                                                <a href="#">
                                                    <div class="deal-details">
                                                        <h6 class="deal-title"><?php echo $data->iklan_nama ?></h6>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								    <table>
                                        <tr>
                                            <td style="width: 480px; height: 215px">
                                                <img class="img-fluid w-100 h-100" src="admin/asset/gambar/<?php 
                                                            $isi=$koneksi->query("SELECT * FROM tb_iklan WHERE iklan_id=7");
                                                            $data=$isi->fetch_object();  
                                                            echo $data->iklan_gambar ?>" alt="">
                                                <a href="#">
                                                    <div class="deal-details">
                                                        <h6 class="deal-title"><?php echo $data->iklan_nama ?></h6>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						            <table >
                                        <tr>
                                            <td style="width: 360px; height: 460px">
                                                <img class="img-fluid h-100" src="admin/asset/gambar/<?php 
                                                            $isi=$koneksi->query("SELECT * FROM tb_iklan WHERE iklan_id=8");
                                                            $data=$isi->fetch_object();  
                                                            echo $data->iklan_gambar ?>" alt="">
                                                <a href="#">
                                                    <div class="deal-details">
                                                        <h6 class="deal-title"><?php echo $data->iklan_nama ?></h6>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
					</div>
				</div>
			</div>
		</div>
	</section>