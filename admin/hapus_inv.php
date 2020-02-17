<?php
    include 'components/koneksi.php';
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM `tb_inv` WHERE inv_id = $id");
    
    header('location:data_inv.php');
    

?>