<?php
    include 'components/koneksi.php';

    

    $id = $_GET['id'];
    $ambil = $koneksi->query("SELECT * FROM tb_info WHERE info_id=$id");
    $pecah = $ambil->fetch_object();
    $gambar = $pecah->info_gambar;
    unlink('asset/gambar/'.$gambar);

    $koneksi->query("DELETE FROM `tb_info` WHERE info_id = $id");
    
    header('location:data_info.php');
    

?>