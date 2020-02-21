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
                    <div class="card-header"><i class="fas fa-table"></i>Data iklan</div>
                        <?php
                            include 'components/koneksi.php';
                            $id = $_GET['id'];
                            $ambil = $koneksi->query("SELECT * FROM tb_iklan WHERE iklan_id= $id");
                            $data = $ambil-> fetch_object();
                            if($id==4){
                                $ukuran="213px X 474px";
                            }elseif($id==5){
                                $ukuran="213px X 220px";
                            }elseif($id==6){
                                $ukuran="213px X 220px";
                            }elseif($id==7){
                                $ukuran="213px X 474px";
                            }elseif($id==8){
                                $ukuran="450px X 350px";
                            }else{
                                $ukuran==null;
                            }
                        ?>
                    <div class="card-body">
                        <a href="data_iklan.php" class="btn btn-primary">
                            < Kembali</a> <br><br>
                                <form method="POST" enctype="multipart/form-data">                                  
                                    <div class="form-group">
                                    
                                        <div class="form-label-group">
                                            <input type="text" class="form-control" name="keterangan" value="<?php echo $data->iklan_nama ?>"></input>
                                            <label>Title</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile02">
                                                <label class="custom-file-label" name="gambar" value="<?php echo $data->iklan_gambar ?>">Pilih Gambar <?php echo $ukuran ?></label><br>                  
                                            </div>
                                        </div>
                                        <img src="asset/gambar/<?php echo $data->iklan_gambar ?>" height="80px" width="auto" alt="">
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
                                            $gambarniq=$data->iklan_gambar;
                                        }

                                        $nama = $_POST['keterangan'];                               
                                            // $query = "UPDATE `tb_iklan` SET frn_id = '$nama', kategori_id = '$kategori', iklan_keterangan ='$keterangan', iklan_tahun = '$tahun', iklan_modal = '$modal', iklan_merk = '$merk', iklan_perusahaan = '$perusahaan', iklan_alamat = '$alamat', iklan_gambar = '$gambarniq' WHERE iklan_id = '$id'";
                                            // echo $query;
                                            // exit;


                                        include 'components/koneksi.php';
                                        $koneksi->query("UPDATE `tb_iklan` SET iklan_nama ='$nama',  iklan_gambar = '$gambarniq' WHERE iklan_id = '$id'");
                                        echo"
                                        <script>window.location='data_iklan.php'</script>";
                                        
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