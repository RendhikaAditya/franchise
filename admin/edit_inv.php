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
                        Data inv</div>
                    <div class="card-body">
                        <a href="data_inv.php" class="btn btn-primary"> < Kembali</a> <br><br>
                        <?php
                            include 'components/koneksi.php';
                            $id = $_GET['id'];
                            $ambil = $koneksi->query("SELECT * FROM tb_inv WHERE inv_id= $id");
                            $data = $ambil-> fetch_object();
                        ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="hidden" value="<?php echo $data->inv_id;?>"  name="id">
                                            <input value="<?php echo $data->inv_nama; ?>" name="name" type="text" class="form-control" autofocus="autofocus">
                                            <label>Nama inv</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input value="<?php echo $data->inv_username; ?>" name="username"type="text" id="inv_username" class="form-control">
                                            <label>UserName inv</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input value="<?php echo $data->inv_password; ?>" name="password" type="password" id="Password" class="form-control">
                                            <label>Password</label>
                                        </div>
                                    </div>
                                    <button name="update" class="btn btn-primary btn-block"> + edit </button>
                                </form>
                                <?php
                                    if(isset($_POST['update'])){
                                        $nama = $_POST['name'];
                                        $username = $_POST['username'];
                                        $pass = $_POST['password'];
                                        $id = $_POST['id'];

                                        include 'components/koneksi.php';
                                        $koneksi->query("UPDATE tb_inv SET inv_nama = '$nama', inv_username = '$username', inv_password='$pass' WHERE inv_id = '$id'");

                                        echo "<script>
                                        window.location='data_inv.php';
                                        </script>";
                                        // header('location:data_inv.php');
                                        
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