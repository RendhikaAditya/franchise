<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="waralaba.php">Waralaba</a></li>
                        <?php
                            session_start();
                                if(isset($_SESSION['frn'])){?>
                        <li class="nav-item"><a class="nav-link" href="tambah.php">Masukan Data </a></li>
                        <li class="nav-item"><a class="nav-link" href="tabel.php">Edit Data </a></li>
                        <?php } ?>
                        <!-- <li class="nav-item"><a class="nav-link" href="about.php">About</a></li> -->
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Daftar</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="daftar_frn.php">franchisor</a></li>
                                <li class="nav-item"><a class="nav-link" href="daftar_inv.php">investor</a></li>
                            </ul>
                        </li>
                        <?php if(isset($_SESSION['frn']) || isset($_SESSION['inv']) ){?>
                                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <?php }else{ ?>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Login</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="franchisor.php">franchisor</a></li>
                                <li class="nav-item"><a class="nav-link" href="investor.php">investor</a></li>
                            </ul>
                        </li>
                        <?php }
                        include 'admin/components/koneksi.php';
                        $isi = $koneksi->query("SELECT * FROM tb_frn");
                        $data = $isi->fetch_object();
                        ?>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                        <li class="nav-item"><a href="#" class="cart"><img src="admin/asset/gambar/user.png"
                                    style="width:40px; " class="border border-danger rounded-circle"></a></li>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div> -->
</header>