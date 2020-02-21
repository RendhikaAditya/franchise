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
                        Data Iklan</div>
                    <div class="card-body">
                        <a href="data_iklan.php" class="btn btn-primary"> < Kembali</a> <br><br>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="nama" type="text" class="form-control">
                                            <label>Title Iklan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="gambar" type="file" class="form-control">
                                            <label>Foto User</label>
                                        </div>
                                    </div>
                                    <button name="save" class="btn btn-primary btn-block"> + Tambah </button>
                                </form>
                                <?php
                                    if(isset($_POST['save'])){
                                        
                                        $nama_gambar = $_FILES['gambar']['name'];
                                        $lokasi = $_FILES['gambar']['tmp_name'];
                                        
                                        $pecahgambar = explode(".",$nama_gambar);
                                        $gambarniq = $pecahgambar[0]=uniqid().".".$pecahgambar[1];
                                        move_uploaded_file($lokasi, "asset/gambar/$gambarniq");

                                        $nama = $_POST['nama'];

                                        include 'components/koneksi.php';

                                        // var_dump($gambarniq);
                                        // echo "INSERT INTO `tb_iklan`(`iklan_nama`, `iklan_gambar`) VALUES ('$nama', '$gambarniq')";
                                        // exit;
     

                                        

                                        
                                        $koneksi->query("INSERT INTO `tb_iklan`(`iklan_nama`, `iklan_gambar`) VALUES ('$nama', '$gambarniq')");
                                        // var_dump($koneksi);
                                        // exit;
                                        // header('location:data_iklan.php');
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