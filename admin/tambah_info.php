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
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Data info</div>
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
                                            <textarea name="keterangan" class="ckeditor"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="tahun" type="text" class="form-control">
                                            <label>Tahun Awal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="modal" type="text" class="form-control">
                                            <label>Modal Awal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="merk" type="text" class="form-control">
                                            <label>Merk</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="perusahaan" type="text" class="form-control">
                                            <label>Perusahaan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="alamat" type="text" class="form-control">
                                            <label>Alamat</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="gambar[]" multiple  type="file" class="form-control">
                                            <label>Gambar</label>
                                        </div>
                                    </div>
                                    <button name="save" class="btn btn-primary btn-block"> + Tambah </button>
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

                                        $nama = $_POST['nama'];
                                        $kategori = $_POST['kategori'];
                                        $keterangan = $_POST['keterangan'];
                                        $tahun = $_POST['tahun'];
                                        $modal = $_POST['modal'];
                                        $merk = $_POST['merk'];
                                        $perusahaan = $_POST['perusahaan'];
                                        $alamat = $_POST['alamat'];                                                                                
                                            // $query = "INSERT INTO `tb_info`(`frn_id`,`kategori_id`,`info_keterangan`,`info_tahun`,`info_modal`,`info_merk`,`info_perusahaan`,`info_alamat`,`info_gambar`) VALUES ('$nama','$kategori','$keterangan','$tahun','$modal','$merk','$perusahaan','$alamat','$gambarniq')";
                                            // echo $query;
                                            // exit;

                                        include 'components/koneksi.php';
                                        $koneksi->query("INSERT INTO `tb_info`(`frn_id`,`kategori_id`,`info_keterangan`,`info_tahun`,`info_modal`,`info_merk`,`info_perusahaan`,`info_alamat`,`info_gambar`) VALUES ('$nama','$kategori','$keterangan','$tahun','$modal','$merk','$perusahaan','$alamat','$gambarniq')");
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