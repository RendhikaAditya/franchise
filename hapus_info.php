<?php
    include 'admin/components/koneksi.php';

    

    $id = $_GET['id'];
    $ambil = $koneksi->query("SELECT * FROM tb_info WHERE info_id=$id");
    $pecah = $ambil->fetch_object();
    $gambar = $pecah->info_gambar;
    unlink('admin/asset/gambar/'.$gambar);

    $koneksi->query("DELETE FROM `tb_info` WHERE info_id = $id");
    // jjj
    header('location:tabel.php');
    

?>