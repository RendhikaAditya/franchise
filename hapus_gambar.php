<?php
    include ('admin/components/koneksi.php');

    

    $id = $_GET['id'];
    $ambil = $koneksi->query("SELECT * FROM tb_gambar WHERE gambar_id=$id");
    $pecah = $ambil->fetch_object();
    $gambar = $pecah->gambar_gambar;
    unlink('admin/asset/gambar/'.$gambar);

    $koneksi->query("DELETE FROM `tb_gambar` WHERE gambar_id = $id");
    
    header('location:tabel.php');
    

?>