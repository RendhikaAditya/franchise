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
                        Data berita</div>
                    <div class="card-body">
                        <a href="data_berita.php" class="btn btn-primary"> < Kembali</a> <br><br>
                        <?php
                            include 'components/koneksi.php';
                            $id = $_GET['id'];
                            $ambil = $koneksi->query("SELECT * FROM tb_berita WHERE berita_id= $id");
                            $data = $ambil-> fetch_object();
                        ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="judul" type="text" value="<?php echo $data->berita_judul;?>" class="form-control" autofocus="autofocus">
                                            <label>Judul berita</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="kategori" type="text" value="<?php echo $data->kategori_id;?>" class="form-control">
                                            <label>kategori berita</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="post" type="text" value="<?php echo $data->berita_post;?>" class="form-control">
                                            <label>Post berita</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="isi" type="text" value="<?php echo $data->berita_isi;?>" class="form-control">
                                            <label>isi berita</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input name="gambar" type="file" class="form-control">
                                            <label>Gambar berita</label>
                                        </div>
                                    </div>
                                                                        
                                    <button name="save" class="btn btn-primary btn-block"> + Tambah </button>
                                </form>
                                <?php
                                    if(isset($_POST['update'])){
                                        $judul = $_POST['judul'];
                                        $kategori = $_POST['kategori'];
                                        $post = $_POST['post'];
                                        $isi = $_POST['isi'];
                                        
                                        $nama_gambar = $_FILES['gambar']['name'];
                                        $lokasi = $_FILES['gambar']['tmp_name'];

                                        $pecahgambar = explode(".",$nama_gambar);
                                        $gambarniq = $pecahgambar[0]=uniqid().".".$pecahgambar[1];
                                        move_uploaded_file($lokasi, "asset/gambar_berita/$gambarniq");

                                        include 'components/koneksi.php';
                                        $koneksi->query("UPDATE tb_berita SET kategori_id = '$kategori', berita_judul ='$judul', berita_post = '$post', berita_gambar = '$gambarniq' WHERE berita_id = '$id'");

                                        // echo "<script>
                                        // window.location='data_berita.php';
                                        // </script>";
                                        header('location:data_berita.php');
                                        
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