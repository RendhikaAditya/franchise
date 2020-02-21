<?php
    include 'components/koneksi.php';

    

    $id = $_GET['id'];
    $ambil = $koneksi->query("SELECT * FROM tb_iklan WHERE iklan_id=$id");
    $pecah = $ambil->fetch_object();
    $gambar = $pecah->iklan_gambar;
    unlink('asset/gambar/'.$gambar);

    $koneksi->query("DELETE FROM `tb_iklan` WHERE iklan_id = $id");
    
    header('location:data_iklan.php');
    

?>