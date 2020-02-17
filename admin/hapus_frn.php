<?php
    include 'components/koneksi.php';
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM `tb_frn` WHERE frn_id = $id");
    
    header('location:data_frn.php');
    

?>