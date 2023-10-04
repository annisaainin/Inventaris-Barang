<?php
session_start();
include "../../koneksi/koneksi.php";
//error_reporting(0);
$id_user = $_SESSION['id_user'];
$sql = mysqli_query($koneksi, "SELECT * from tb_user where id_user='$id_user'");
$qry = (mysqli_num_rows($sql));
if ($qry == 0) {
?>
  <script language="JavaScript">
    alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
    document.location = '../../index.php';
  </script>
<?php
}

if (empty($_SESSION)) {
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


  <title>The Logistic - Tambah Metode Pembayaran</title>

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
              <a href="data-barang.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-metode-pembayaran.php"><b>Data Metode Pembayaran</b></a> / Tambah Metode Pembayaran</li>
          </ol>
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Metode Pembayaran</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <form action="pro-tambah-metode-pembayaran.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

                  <?php
                  $kode = 'MP';
                  $query = mysqli_query($koneksi, "SELECT MAX(id_metode) as idnew FROM tb_metode_pembayaran");
                  $row = mysqli_fetch_array($query);

                  $max_id = $row['idnew'];
                  $max_ids = (int) substr($max_id, 5, 5);
                  $id_metode = $max_ids + 1;
                  $auto = $kode . sprintf("%05s", $id_metode);
                  ?>
                  <input class="form-control" type="hidden" name="id_metode" placeholder="ID" value="<?php echo $auto; ?>" readonly />
                  <!-- <input class="form-control" type="hidden" name="id_user" placeholder="ID" value="<?php echo $id_user; ?>" readonly/> -->

                  <div class="form-group">
                    <label class="col-lg-9">Nama Metode Pembayaran</label>
                    <div class="col-lg-12">
                      <input class="form-control form-control-user" placeholder="Masukkan Nama Metode Pembayaran" type="text" name="nama_metode" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Jumlah Cashback</label>
                    <div class="col-lg-12">
                      <input class="form-control form-control-user" placeholder="Masukkan Jumlah Cashback" type="text" name="cashback" required="">
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

</html>