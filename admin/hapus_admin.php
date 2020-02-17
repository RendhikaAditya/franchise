<?php
    include 'components/koneksi.php';
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM `tb_admin` WHERE admin_id = $id");
    
    header('location:data_admin.php');
    

?>