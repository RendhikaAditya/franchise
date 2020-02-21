<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
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

<body id="category">
        <?php
		    include 'asset/navbar.php';
        ?>
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
        
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                        <div class="col-first">
                            <h1>Data Waralaba</h1>
                            <nav class="d-flex align-items-center">
                                <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                                <a href="tabel.php">Tabel</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
 
    <div class="container">
        <div class="col-md-12">
            <div class="table-responsive-sm">
                <table class="table radius" style="margin-top: 70px; margin-bottom:70px">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Franchisor</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Telpon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id=$_SESSION['frn']->frn_id;
                        include("admin/components/koneksi.php");                     
                        $satu = $koneksi->query("SELECT * FROM tb_frn WHERE frn_id=$id");
                        
                        $no=1;
                        
                        while($data = $satu->fetch_object()){;
                            $ambil = $koneksi->query("SELECT * FROM tb_info LEFT JOIN tb_kategori ON tb_info.kategori_id = tb_kategori.kategori_id LEFT JOIN tb_frn ON tb_info.frn_id = tb_frn.frn_id");
                            $diti= $ambil->fetch_object();
                        // var_dump($data);
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data->frn_nama?></td>
                            <td><?php echo $data->frn_username?></td>
                            <td><?php echo $data->frn_password?></td>
                            <td><?php echo $data->frn_telpon?></td>
                            <td><?php echo $data->frn_email?></td>
                            <td><?php echo $data->frn_web?></td>
                            <td><img src="admin/asset/gambar/<?php echo $data->frn_gambar?>" alt="" width="100px"
                                    hight="100px"></td>
                            <td width="90px">
                                <center>
                                        <a href="edit_frn.php?id=<?php echo $data->frn_id; ?>" style="width: 100%" class="btn btn-success">Edit</a>    
                                        <a onclick="return confirm('anda yakin hapus')"
                                        href="hapus_info.php?id=<?php echo $data->info_id; ?>"
                                        class="btn btn-danger">hapus</a>
                                </center>
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive-sm">
                <table class="table radius" style="margin-top: 70px; margin-bottom:70px">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Franchisor</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tahun Awal</th>
                            <th scope="col">Modal Awal</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id=$_SESSION['frn']->frn_id;
                        include("admin/components/koneksi.php");                     
                        $satu = $koneksi->query("SELECT * FROM tb_info WHERE frn_id=$id");
                        
                        $no=1;
                        
                        while($data = $satu->fetch_object()){;
                            $iid=$data->frn_id;
                            $iidd=$data->kategori_id;
                            $ambil = $koneksi->query("SELECT * FROM tb_frn WHERE frn_id=$iid");
                            $diti= $ambil->fetch_object();
                            
                            $sql=$koneksi->query("SELECT * FROM `tb_info` LEFT JOIN tb_kategori ON tb_info.kategori_id=tb_kategori.kategori_id WHERE frn_id=$id");
                            $ditu=$sql->fetch_object();
                            
                        // var_dump($data);
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $diti->frn_nama?></td>
                            <td><?php echo $ditu->kategori_nama?></td>
                            <td><?php echo substr($data->info_keterangan,0,300); ?></td>
                            <td><?php echo $data->info_tahun?></td>
                            <td><?php echo $data->info_modal?></td>
                            <td><?php echo $data->info_merk?></td>
                            <td><?php echo $data->info_perusahaan?></td>
                            <td><?php echo $data->info_alamat?></td>
                            <td width="90px">
                                <center>
                                        <a href="edit_info.php?id=<?php echo $data->frn_id; ?>" style="width: 100%" class="btn btn-success">Edit</a>    
                                        <a onclick="return confirm('anda yakin hapus')"
                                        href="hapus_info.php?id=<?php echo $data->info_id; ?>"
                                        class="btn btn-danger">hapus</a>
                                </center>
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive-sm">
                <table class="table radius" style="margin-top: 70px; margin-bottom:70px">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col"style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id=$_SESSION['frn']->frn_id;
                        include("admin/components/koneksi.php");                     
                        $satu = $koneksi->query("SELECT * FROM tb_gambar WHERE frn_id=$id");                        
                        $no=1;
                        while($data = $satu->fetch_object()){;
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><img src="admin/asset/gambar/<?php echo $data->gambar_gambar?>" alt="" width="100%"
                                    hight="auto"></td>
                            <td width="90px">
                                <center>
                                    <a onclick="return confirm('anda yakin hapus')"
                                        href="hapus_gambar.php?id=<?php echo $data->gambar_id; ?>"
                                        class="btn btn-danger">hapus</a>
                                </center>
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
                            <div class="col-md-12 form-group">
                                <form method="POST" enctype="multipart/form-data">
                                    <label style="margin-left: 16px">Tambah Gambar</label>                                    
                                    <label class="file" style="width: 100%">                                
                                        <input type="file" name="gambar" aria-label="File browser example">
                                        <span class="file-custom"></span>                                    
                                    </label>       
 
                                    <button name="save" class="btn primary-btn rounded text-center" style="width: 100%; margin-top:10px"> Tambah gambar</button>
                                </form>
                                <?php 
                                    if(isset($_POST['save'])){                                        

                                        $nama_gambar = $_FILES['gambar']['name'];
                                        $lokasi = $_FILES['gambar']['tmp_name'];

                                        $pecahgambar = explode(".",$nama_gambar);
                                        $gambarniq = $pecahgambar[0]=uniqid().".".$pecahgambar[1];
                                        move_uploaded_file($lokasi, "admin/asset/gambar/$gambarniq");

                                        include 'admin/components/koneksi.php';
                                        $koneksi->query("INSERT INTO `tb_gambar`(`frn_id`, `gambar_gambar`) VALUES ('$id', '$gambarniq')");
                                        echo"
                                        <script>window.location='tabel.php'</script>";
                                    }
                                ?>               
                            </div>                 
            </div>
        </div>
    </div>

    <?php
		    include 'asset/footer.php';
		?>


</body>

</html>