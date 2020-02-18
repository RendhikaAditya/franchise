<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("components/head.php"); ?>
</head>

<body id="page-top">

    <!-- Navigation Bar -->
    <?php include("components/top-bar.php");?>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("components/side-bar.php");?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <?php include("components/breadcrumbs.php");?>



                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i>Data info</div>
                        <?php
                            include 'components/koneksi.php';
                            $id = $_GET['id'];
                            $ambil = $koneksi->query("SELECT * FROM tb_info WHERE info_id= $id");
                            $data = $ambil-> fetch_object();
                        ?>
                    <div class="card-body">
                        <a href="data_info.php" class="btn btn-primary">
                            < Kembali</a> <br><br>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama Franchisor</label>
                                        <div class="form-label-group">
                                            <select class="form-control" name="nama">
                                                <?php include 'components/koneksi.php';
                                                $ddata = $koneksi->query("SELECT * FROM tb_frn");
                                                while($isi = $ddata->fetch_object()){?>
                                                <option value="<?php echo  $isi->frn_id; ?>">
                                                    <?php echo $isi->frn_nama; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>kategori Franchisor</label>
                                        <div class="form-label-group">
                                            <select class="form-control" name="kategori">
                                                <?php include 'components/koneksi.php';
                                                $dato = $koneksi->query("SELECT * FROM tb_kategori");
                                                while($isi = $dato->fetch_object()){?>
                                                <option value="<?php echo  $isi->kategori_id; ?>">
                                                    <?php echo $isi->kategori_nama; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label>keterangan</label>
                                        <div class="form-label-group">
                                            <textarea name="keterangan" class="ckeditor" value="<?php echo $data->info_keterangan ?>"><?php echo $data->info_keterangan ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="tahun" value="<?php echo $data->info_tahun ?>" type="text" class="form-control">
                                            <label>Tahun Awal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="modal" value="<?php echo $data->info_modal ?>"  type="text" class="form-control">
                                            <label>Modal Awal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="merk" value="<?php echo $data->info_merk ?>"  type="text" class="form-control">
                                            <label>Merk</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="perusahaan" value="<?php echo $data->info_perusahaan ?>"  type="text" class="form-control">
                                            <label>Perusahaan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="alamat" value="<?php echo $data->info_alamat ?>"  type="text" class="form-control">
                                            <label>Alamat</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="gambar" value="<?php echo $data->info_gambar ?>"  type="file" class="form-control">        
                                            <img src="asset/gambar/<?php echo $data->info_gambar ?>" height="80px" width="auto" alt="">
                                            <label>Gambar</label>
                                        </div>
                                    </div>
                                    
                                    <button name="save" class="btn btn-primary btn-block"> + Edit </button>
                                </form>
                                <?php
                                    if(isset($_POST['save'])){
                                        // var_dump ($_FILES['gambar']);
                                        // exit;
                                        $nama_gambar = $_FILES['gambar']['name'];
                                        $lokasi = $_FILES['gambar']['tmp_name'];

                                        $pecahgambar = explode(".",$nama_gambar);
                                        $gambarniq = $pecahgambar[0]=uniqid().".".$pecahgambar[1];
                                        move_uploaded_file($lokasi, "asset/gambar/$gambarniq");

                                        if(empty($nama_gambar)){
                                            $gambarniq=$data->info_gambar;
                                        }

                                        $nama = $_POST['nama'];
                                        $kategori = $_POST['kategori'];
                                        $keterangan = $_POST['keterangan'];
                                        $tahun = $_POST['tahun'];
                                        $modal = $_POST['modal'];
                                        $merk = $_POST['merk'];
                                        $perusahaan = $_POST['perusahaan'];
                                        $alamat = $_POST['alamat'];                                                                                
                                            // $query = "UPDATE `tb_info` SET frn_id = '$nama', kategori_id = '$kategori', info_keterangan ='$keterangan', info_tahun = '$tahun', info_modal = '$modal', info_merk = '$merk', info_perusahaan = '$perusahaan', info_alamat = '$alamat', info_gambar = '$gambarniq' WHERE info_id = '$id'";
                                            // echo $query;
                                            // exit;


                                        include 'components/koneksi.php';
                                        $koneksi->query("UPDATE `tb_info` SET frn_id = '$nama', kategori_id = '$kategori', info_keterangan ='$keterangan', info_tahun = '$tahun', info_modal = '$modal', info_merk = '$merk', info_perusahaan = '$perusahaan', info_alamat = '$alamat', info_gambar = '$gambarniq' WHERE info_id = '$id'");
                                        echo"
                                        <script>window.location='data_info.php'</script>";
                                        
                                    }
                                    ?>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php include("components/footer.php");?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php include("components/script.php"); ?>
</body>

</html>