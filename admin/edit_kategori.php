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
                        Data kategori</div>
                    <div class="card-body">
                        <a href="data_kategori.php" class="btn btn-primary"> < Kembali</a> <br><br>
                        <?php
                            include 'components/koneksi.php';
                            $id = $_GET['id'];
                            $ambil = $koneksi->query("SELECT * FROM tb_kategori WHERE kategori_id= $id");
                            $data = $ambil-> fetch_object();
                        ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="hidden" value="<?php echo $data->kategori_id;?>"  name="id">
                                            <input value="<?php echo $data->kategori_nama; ?>" name="name" type="text" class="form-control" autofocus="autofocus">
                                            <label>Nama kategori</label>
                                        </div>
                                    </div>                                    
                                    <button name="update" class="btn btn-primary btn-block"> + edit </button>
                                </form>
                                <?php
                                    if(isset($_POST['update'])){
                                        $nama = $_POST['name'];
                                        $id = $_POST['id'];

                                        include 'components/koneksi.php';
                                        $koneksi->query("UPDATE tb_kategori SET kategori_nama = '$nama' WHERE kategori_id = '$id'");

                                        // echo "<script>
                                        // window.location='data_kategori.php';
                                        // </script>";
                                        header('location:data_kategori.php');
                                        
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