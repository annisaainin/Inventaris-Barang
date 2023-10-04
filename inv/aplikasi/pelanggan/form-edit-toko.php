<?php
session_start();
include "../../koneksi/koneksi.php";
//error_reporting(0);
$id_toko = $_GET['id_toko'];

// $query9 = "SELECT * FROM tb_detail_gambar WHERE id_barang='$id_barang'";
// $sql9 = mysqli_query($koneksi, $query9); 
// $data9 = mysqli_fetch_array($sql9);
// for ($i=0; $i < count($data9['id_barang']); $i++) { 
//   $i=$i+1;
// }
// echo $i;

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


  <title>Ikita Store - Edit Toko</title>

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
              <a href="data-toko-saya.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-toko-saya.php"><b>Toko Saya</b></a> / Edit Toko</li>
          </ol>
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Toko</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <?php
                $data = mysqli_query($koneksi, "SELECT * from tb_toko where id_toko='$id_toko'");
                while ($r = mysqli_fetch_array($data)) {
                ?>

                  <form action="pro-edit-toko.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

                    <input class="form-control" type="hidden" name="id_toko" placeholder="ID" value="<?php echo $id_toko; ?>" readonly />

                    <div class="form-group">
                      <label class="col-lg-9">Nama Toko</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Toko" type="text" value="<?php echo $r['nama_toko']; ?>" name="nama_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">No. Telepon</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan No. Telepon Toko" type="text" value="<?php echo $r['telp_toko']; ?>" name="telp_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">No. Whatsapp</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan No. Whatsapp Toko" type="text" value="<?php echo $r['wa_toko']; ?>" name="wa_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">RT</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan No. RT" type="text" value="<?php echo $r['rt_toko']; ?>" name="rt_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">RW</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan No. RW" type="text" value="<?php echo $r['rw_toko']; ?>" name="rw_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">Alamat</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Alamat" type="text" value="<?php echo $r['jalan_toko']; ?>" name="jalan_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">Desa</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Desa" type="text" value="<?php echo $r['desa_toko']; ?>" name="desa_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">Kecamatan</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Kecamatan" type="text" value="<?php echo $r['kec_toko']; ?>" name="kec_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">Kota</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Kota" type="text" value="<?php echo $r['wil_toko']; ?>" name="wil_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">Provinsi</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Provinsi" type="text" value="<?php echo $r['prov_toko']; ?>" name="prov_toko" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">Kode Pos</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Kode Pos" type="text" value="<?php echo $r['kode_pos']; ?>" name="kode_pos" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-9">Deskripsi</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Deskripsi" type="text" value="<?php echo $r['des_toko']; ?>" name="des_toko" required="">
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label class="col-lg-9">Jarak</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Jarak" type="text" value="<?php echo $r['jarak_toko']; ?>" name="jarak_toko" required="">
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label class="col-lg-9">Link Google Maps</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Link" type="text" value="<?php echo $r['gmaps']; ?>" name="gmaps" required="">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-warning" type="submit">Update</button>
                    </div>
                  </form>
                <?php } ?>
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