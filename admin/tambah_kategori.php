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
                                <form method="POST">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="name" type="text" class="form-control" autofocus="autofocus">
                                            <label>Nama kategori</label>
                                        </div>
                                    </div>                                    
                                    <button name="save" class="btn btn-primary btn-block"> + Tambah </button>
                                </form>
                                <?php
                                    if(isset($_POST['save'])){
                                        $nama = $_POST['name'];

                                        include 'components/koneksi.php';
                                        $koneksi->query("INSERT INTO `tb_kategori`(`kategori_nama`) VALUES ('$nama')");
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