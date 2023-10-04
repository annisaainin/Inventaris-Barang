<?php
  session_start();
  include "../../koneksi/koneksi.php";
  $noseri = $_GET['noseri'];
  
  //error_reporting(0);
  $nip_nrp = $_SESSION['nip_nrp'];
  $sql = mysqli_query($koneksi, "SELECT * from tb_admin where nip_nrp='$nip_nrp'");
  $qry = (mysqli_num_rows($sql));
  if($qry==0){
    ?>
    <script language="JavaScript">
        alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
        document.location='../../index.php';
      </script>
      <?php
  }

  if(empty($_SESSION)){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu');
    document.location='../../index.php';
    </script>";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../../../assets/img/favicon.ico" type="image/x-icon">


  <title>The Logistic - Data Barang</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/fonts-googleapis.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'topbar.php'; ?>
        <!-- End of Topbar -->
      
        <!-- Begin Page Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li>
              <a href="data-barang.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-barang.php"><b>Data Barang</b></a> / Tambah Data Keluar</li>
          </ol> 
          <!-- <ol class="breadcrumb">
        <li><a href="data-berita.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Data Berita</li>
        <li class="active">Data Semua Berita</li>
      </ol> -->
          <!-- Page Heading -->


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Barang Keluar</h6>
            </div>
           <div class="card-body">
           <form action="pro-tambah-data-keluar.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
    
          <?php 
             $kode = 'KL';
             $query = mysqli_query($koneksi,"SELECT MAX(kode_keluar) as idnew FROM keluar");
             $row = mysqli_fetch_array($query);

             $max_id = $row['idnew'];
             $max_ids = (int) substr($max_id,5,5);
             $kode_keluar = $max_ids+1;
             $auto = $kode.sprintf("%05s", $kode_keluar);
          ?>      
          <input class="form-control" type="hidden" name="kode_keluar" placeholder="ID" value="<?php echo $auto; ?>" readonly />   
          
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Seri</th>
                      <th>Gambar</th>
                      <th>Tipe Barang</th>
                      <th>Nama Barang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../../koneksi/koneksi.php";
                    
                     $sql=mysqli_query($koneksi,"SELECT * from barang b inner join jenis_barang j on b.id_jenis=j.id_jenis inner join kondisi_barang g on b.id_kondisi=g.id_kondisi inner join tipe_barang t on b.tipe_barang=t.tipe_barang WHERE b.noseri='$noseri' group by b.noseri");
                     while ($data = mysqli_fetch_array($sql)){
                      $tipe_barang=$data['tipe_barang'];
                      $nama_barang=$data['nama_barang'];
                    ?>
                    <tr>
                      <td><?php echo $data['noseri']; ?></td>
                      <td><img src="images/<?php echo $data['gambar']; ?>" width="150px"></td>
                      <td><?php echo $data['tipe_barang']; ?></td>
                      <td><?php echo $data['nama_barang']; ?></td>
                    </tr>                   
                    <?php } 
                    ?>
                    <tr>
                      <th>Jenis Barang</th>
                      <th>Jumlah</th>
                      <th>Kondisi</th>
                      <th>Lokasi</th>
                    </tr>

                    <?php
                    include "../../koneksi/koneksi.php";
                    
                     $sql=mysqli_query($koneksi,"SELECT * from barang b inner join jenis_barang j on b.id_jenis=j.id_jenis inner join kondisi_barang g on b.id_kondisi=g.id_kondisi inner join tipe_barang t on b.tipe_barang=t.tipe_barang WHERE b.noseri='$noseri' group by b.noseri");
                     while ($data = mysqli_fetch_array($sql)){
                      $id_jenis=$data['id_jenis'];
                      $jumlah=$data['jumlah'];
                      $id_kondisi=$data['id_kondisi'];
                      $lokasi=$data['lokasi'];
                    ?>
                    <tr>
                      <td><?php echo $data['jenis_barang']; ?></td>
                      <td><?php echo $data['jumlah']; ?></td>
                      <td><?php echo $data['jenis_kondisi']; ?></td>
                      <td><?php echo $data['lokasi']; ?></td>
                    </tr>                   
                    <?php } 
                    ?>
                  </tbody>
                </table>
                
                <input class="form-control" type= "hidden" name="noseri" placeholder="ID" value="<?php echo $noseri; ?>" readonly />
                <input class="form-control" type= "hidden" name="tipe_barang" placeholder="ID" value="<?php echo $tipe_barang; ?>" readonly />
                <input class="form-control" type= "hidden" name="nama_barang" placeholder="ID" value="<?php echo $nama_barang; ?>" readonly />
                <input class="form-control" type= "hidden" name="id_jenis" placeholder="ID" value="<?php echo $id_jenis; ?>" readonly />
                <input class="form-control" type= "hidden" name="jumlah" placeholder="ID" value="<?php echo $jumlah; ?>" readonly />
                <input class="form-control" type= "hidden" name="id_kondisi" placeholder="ID" value="<?php echo $id_kondisi; ?>" readonly />
                <input class="form-control" type= "hidden" name="lokasi" placeholder="ID" value="<?php echo $lokasi; ?>" readonly />

                <div class="form-group">
                    <label class="col-lg-9">Gambar Barang</label>
                      <div class="col-lg-6">
                      <input type="file" name="file_gambar" style="display:block">
                      </div>
                  </div>
                                  
                <div class="form-group">
                    <label class="col-lg-9">Tanggal Keluar</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Tanggal Keluar" type="date" name="tgl_keluar" required="">
                      </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-9">Penerima</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Penerima" type="varchar" name="penerima" required="">
                      </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-9">Surat Keluar</label>
                      <div class="col-lg-6">
                      <input type="file" name="file_keluar" style="display:block" required="">
                      </div>
                  </div>             
                  <div class="form-group">
                    <label class="col-lg-9">Keterangan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Keterangan" type="varchar" name="keterangan" required="">
                      </div>
                  </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

       

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'footer.php';  ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>
 </body>

</html>
