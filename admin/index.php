<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  
    if(empty($_SESSION['akun'])){
        header ('location:login.php');    
    }
  include("components/head.php"); ?>
</head>

<body id="page-top">

  <!-- Navigation Bar -->
    <?php include("components/top-bar.php");?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("components/side-bar.php");?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php include("components/breadcrumbs.php");?>

        <!-- Icon Cards-->
        <?php include("components/icon-card.php");?>


        <!-- DataTables Example -->
        <center><h1>Selamat data Di halaman adminstrator</h1></center>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include("components/footer.php");?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


 <?php include("components/script.php"); ?>
</body>

</html>
