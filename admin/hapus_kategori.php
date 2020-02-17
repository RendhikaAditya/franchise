<?php
    include 'components/koneksi.php';
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM `tb_kategori` WHERE kategori_id = $id");
    
    header('location:data_kategori.php');
    

?>