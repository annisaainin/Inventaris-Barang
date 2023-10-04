<?php
  session_start();
  include "../../koneksi/koneksi.php";
  //error_reporting(0);
  $id_user = $_SESSION['id_user'];
  $sql = mysqli_query($koneksi, "SELECT * from tb_user where id_user='$id_user'");
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


  <title>The Logistic - Tambah Kendaraan</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/fonts-googleapis.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../assets/css/uploads-image.css">
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
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li>
              <a href="data-kendaraan.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-kendaraan.php"><b>Data Kendaraan</b></a> / Tambah Kendaraan</li>
          </ol> 
          <!-- Page Heading -->                 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kendaraan</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <form action="pro-tambah-kendaraan.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  
                  <?php 
                  $kode = 'KD';
                  $query = mysqli_query($koneksi,"SELECT MAX(id_kendaraan) as idnew FROM tb_kendaraan");
                  $row = mysqli_fetch_array($query);

                  $max_id = $row['idnew'];
                  $max_ids = (int) substr($max_id,5,5);
                  $id_kendaraan = $max_ids+1;
                  $auto = $kode.sprintf("%05s", $id_kendaraan);
                  ?>
                 
                  
                  <input class="form-control" type="hidden" name="id_kendaraan" placeholder="ID" value="<?php echo $auto; ?>" readonly/>
                  <!-- <input class="form-control" type="hidden" name="id_user" placeholder="ID" value="<?php echo $id_user; ?>" readonly/> -->
                  
                  <div class="form-group">
                    <label class="col-lg-9">Nomor Polisi</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Nomor Polisi" type="text" name="no_pol" required="">
                      </div>
                  </div>     
                  <div class="form-group">
                    <label class="col-lg-9">Nama Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Kendaraan" type="text" name="nama_kendaraan" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tipe Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Tipe Kendaraan" type="text" name="tipe_kendaraan" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Merk Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Merk Kendaraan" type="text" name="merk_kendaraan" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tahun Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Tahun Kendaraan" type="month" name="tahun_kendaraan" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Batas Berat Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Batas Berat Kendaraan" type="number" name="batas_berat" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Panjang Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" type="number" name="panjang_kendaraan" placeholder="Masukkan Panjang Kendaraan" ></input>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Lebar Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Lebar Kendaraan" type="number" name="lebar_kendaraan" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tinggi Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Tinggi Kendaraan" type="number" name="tinggi_kendaraan" required="">
                      </div>
                  </div>                  
                  <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
                </form>
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

 </body>

</html>
