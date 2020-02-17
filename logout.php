<?php
    session_start();
    session_destroy();
    
    echo "<script>
    alert('anda telah logout');
    window.location='index.php';
    </script>";

    //  header ('location:index.php');
?>