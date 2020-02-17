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
                        Data frn</div>
                    <div class="card-body">
                        <a href="data_frn.php" class="btn btn-primary"> < Kembali</a> <br><br>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="name" type="text" class="form-control" autofocus="autofocus">
                                            <label>Nama frn</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="username"type="text" id="frn_username" class="form-control">
                                            <label>UserName frn</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="password" type="password"  class="form-control">
                                            <label>Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="telpon" type="text"  class="form-control">
                                            <label>Telpon</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="email" type="text"  class="form-control">
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="web" type="text"  class="form-control">
                                            <label>Web</label>
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

                                        // var_dump($gambarniq);
                                        // exit;

                                        $nama = $_POST['name'];
                                        $username = $_POST['username'];
                                        $pass = $_POST['password'];
                                        $telpon = $_POST['telpon'];
                                        $email = $_POST['email'];
                                        $web = $_POST['web'];

                                        include 'components/koneksi.php';
                                        $koneksi->query("INSERT INTO `tb_frn`(`frn_nama`, `frn_username`, `frn_password`, `frn_telpon`, `frn_email`, `frn_web`, `frn_gambar`) VALUES ('$nama','$username','$pass','$telpon','$email','$web','$gambarniq')");
                                        // header('location:data_frn.php');
                                        echo"
                                        <script>window.location='data_frn.php'</script>";
                                        
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