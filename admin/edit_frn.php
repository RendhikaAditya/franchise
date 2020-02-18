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
                        <?php
                            include 'components/koneksi.php';
                            $id = $_GET['id'];
                            $ambil = $koneksi->query("SELECT * FROM tb_frn WHERE frn_id= $id");
                            $data = $ambil-> fetch_object();
                        ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="hidden" value="<?php echo $data->frn_id;?>"  name="id">
                                            <input value="<?php echo $data->frn_nama; ?>" name="name" type="text" class="form-control" autofocus="autofocus">
                                            <label>Nama frn</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input value="<?php echo $data->frn_username; ?>" name="username"type="text" id="frn_username" class="form-control">
                                            <label>UserName frn</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input value="<?php echo $data->frn_password; ?>" name="password" type="password" id="Password" class="form-control">
                                            <label>Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input value="<?php echo $data->frn_telpon; ?>" name="telpon" type="text" id="Password" class="form-control">
                                            <label>Telpon</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input value="<?php echo $data->frn_email; ?>" name="email" type="text" id="Password" class="form-control">
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input value="<?php echo $data->frn_web; ?>" name="web" type="text" id="Password" class="form-control">
                                            <label>Web</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="gambar" value="<?php echo $data->frn_gambar ?>"  type="file" class="form-control">        
                                            <img src="asset/gambar/<?php echo $data->frn_gambar ?>" height="80px" width="auto" alt="">
                                            <label>Gambar</label>
                                        </div>
                                    </div>
                                    <button name="update" class="btn btn-primary btn-block"> + edit </button>
                                </form>
                                <?php
                                    if(isset($_POST['update'])){

                                        $nama_gambar = $_FILES['gambar']['name'];
                                        $lokasi = $_FILES['gambar']['tmp_name'];

                                        
                                        $pecahgambar = explode(".",$nama_gambar);
                                        $gambarniq = $pecahgambar[0]=uniqid().".".$pecahgambar[1];
                                        move_uploaded_file($lokasi, "asset/gambar/$gambarniq");

                                        if(empty($nama_gambar)){
                                            $gambarniq=$data->frn_gambar;
                                        }

                                        $nama = $_POST['name'];
                                        $username = $_POST['username'];
                                        $pass = $_POST['password'];
                                        $telpon = $_POST['telpon'];
                                        $email = $_POST['email'];
                                        $web = $_POST['web'];
                                        $id = $_POST['id'];


                                        include 'components/koneksi.php';
                                        $koneksi->query("UPDATE tb_frn SET frn_nama = '$nama', frn_username = '$username', frn_password='$pass', frn_telpon='$telpon', frn_email='$email', frn_web='$web', frn_gambar='$gambarniq' WHERE frn_id = '$id'");

                                        echo "<script>
                                        window.location='data_frn.php';
                                        </script>";
                                        // header('location:data_frn.php');
                                        
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