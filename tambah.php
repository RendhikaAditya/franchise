<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
         .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: 'Select some files';
            display: inline-block;
            background: linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }
        .custom-file-input:hover::before {
            border-color: black;
        }
        .custom-file-input:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }
        *,
        *:before,
        *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        }

    </style>
</head>

<body>

    <!-- Start Header Area -->
    <?php include 'asset/navbar.php'; ?>
    <!-- End Header Area -->
    <?php 
        // session_start();
            // var_dump($_SESSION['frn']);
            if(empty($_SESSION['frn'])){
                echo "<script>
									alert('Anda Harus Login Untuk Menambah Data');
									window.location='franchisor.php';
									</script>";                   
            }        
            
        ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Tambah Data franchaise</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="tambah.php">Tambah</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->


    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="col-md-6 form-group p_star">
                            <label>Nama Waralaba</label>
                            
                                <input type="text" value="<?php echo $_SESSION['frn']->frn_nama ?>" class="form-control" name="nama" readonly>
                            </div>
                            <div class="col-md-6 form-group p_star">
                            <label>Kategori Waralaba</label>
                                <select  class="country_select" name="kategori">
                                    <?php include 'components/koneksi.php';
                                        $dato = $koneksi->query("SELECT * FROM tb_kategori");
                                        while($isi = $dato->fetch_object()){?>
                                        <option value="<?php echo  $isi->kategori_id; ?>">
                                        <?php echo $isi->kategori_nama; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>                            
                            <div class="col-md-12 form-group">
                            <label>Keterangan</label>
                                <textarea name="keterangan" class="ckeditor"></textarea>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Tahun Awal</label>    
                                <input name="tahun" type="text" class="form-control">                            
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Modal Awal</label>    
                                <input name="modal" type="text" class="form-control">                            
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>merk</label>    
                                <input name="merk" type="text" class="form-control">                            
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>perusahaan</label>    
                                <input name="perusahaan" type="text" class="form-control">                            
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>alamat</label>    
                                <input name="alamat" type="text" class="form-control">                            
                            </div>                                                
                            <div class="col-md-12 form-group">
                                <button name="save" class="primary-btn rounded" style="width:100%">Save</button>
                            </div>
                        </form>
                        <?php
                                    if(isset($_POST['save'])){
                                        // var_dump ($_FILES['gambar']);
                                        // exit;
                                        // $nama_gambar = $_FILES['gambar']['name'];
                                        // $lokasi = $_FILES['gambar']['tmp_name'];

                                        // $pecahgambar = explode(".",$nama_gambar);
                                        // $gambarniq = $pecahgambar[0]=uniqid().".".$pecahgambar[1];
                                        // move_uploaded_file($lokasi, "admin/asset/gambar/$gambarniq");

                                        $nama = $_SESSION['frn']->frn_id;
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

                                        include 'admin/components/koneksi.php';
                                        $koneksi->query("INSERT INTO `tb_info`(`frn_id`,`kategori_id`,`info_keterangan`,`info_tahun`,`info_modal`,`info_merk`,`info_perusahaan`,`info_alamat`) VALUES ('$nama','$kategori','$keterangan','$tahun','$modal','$merk','$perusahaan','$alamat')");
                                        echo"
                                        <script>
                                        window.location='tabel.php'</script>";
                                        
                                    }
                                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <!-- start footer Area -->
    <?php include 'asset/footer.php'; ?>
</body>

</html>