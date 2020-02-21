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
            Data info</div>
          <div class="card-body">
            <a href="tambah_info.php" class="btn btn-primary">+ Tambah Data</a><br><br>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php $no=1; ?>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Franchisor</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Tahun Awal</th>
                    <th>Modal Awal</th>
                    <th>Merk</th>
                    <th>Perusahaan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>              
                <tbody>
                    <?php
                        include("components/koneksi.php");
                        $ambil = $koneksi->query("SELECT * FROM tb_info LEFT JOIN tb_kategori ON tb_info.kategori_id = tb_kategori.kategori_id LEFT JOIN tb_frn ON tb_info.frn_id = tb_frn.frn_id");
                        while($data = $ambil->fetch_object()){;
                        // var_dump($data);
                    ?>
                  <tr>                    
                    <td width = "10px"><?php echo $no ?></td>
                    <td><?php echo $data->frn_nama?></td>
                    <td><?php echo $data->kategori_nama?></td>
                    <td><?php echo $data->info_keterangan?></td>
                    <td><?php echo $data->info_tahun?></td>
                    <td><?php echo $data->info_modal?></td>
                    <td><?php echo $data->info_merk?></td>
                    <td><?php echo $data->info_perusahaan?></td>
                    <td><?php echo $data->info_alamat?></td>
                    <td width = "90px"><center><a href="edit_info.php?id=<?php echo $data->info_id; ?>" class="btn btn-success"><span class="fa fa-pen"></span></a>
                                               <a onclick = "return confirm('anda yakin hapus')" href="hapus_info.php?id=<?php echo $data->info_id; ?>" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a>                                 </span></a>
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
