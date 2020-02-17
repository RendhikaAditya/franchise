<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("components/head.php"); ?>
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

     

        <!-- DataTables Example -->        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data gambar</div>
          <div class="card-body">
            <a href="tambah_gambar.php" class="btn btn-primary">+ Tambah Data</a><br><br>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php $no=1; ?>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>            
                    <th>gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>              
                <tbody>
                    <?php
                        include("components/koneksi.php");
                        $ambil = $koneksi->query("SELECT * FROM tb_gambar LEFT JOIN tb_frn ON tb_gambar.frn_id=tb_frn.frn_id");
                        while($data = $ambil->fetch_object()){;
                        // var_dump($data);
                    ?>
                  <tr>                    
                    <td width = "10px"><?php echo $no ?></td>
                    <td><?php echo $data->frn_nama?></td>
                    <td><img src="asset/gambar/<?php echo $data->gambar_gambar?>" alt="" width="100px" hight="100px"></td>
                    <td width = "90px"><center><a href="edit_gambar.php?id=<?php echo $data->gambar_id; ?>" class="btn btn-success"><span class="fa fa-pen"></span></a>
                                               <a onclick = "return confirm('anda yakin hapus')" href="hapus_gambar.php?id=<?php echo $data->gambar_id; ?>" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a></span></a>
                    </center></td>
                  </tr>
                        <?php $no=$no+1;}?>                  
                </tbody>
              </table>
            </div>
          </div>
        </div>

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
