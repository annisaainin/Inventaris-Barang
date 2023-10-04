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


  <title>The Logistic - Data Toko</title>

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
        <div class="container-fluid">
          <!-- <ol class="breadcrumb">
        <li><a href="data-berita.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Data Berita</li>
        <li class="active">Data Semua Berita</li>
      </ol> -->
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Toko</h1>
          <p class="mb-4">Menu yang berisi berbagai data toko. Menu ini juga tersedia fitur tambah toko, edit dan hapus. </p>
          <?php
          $kode = 'TK';
          $query = mysqli_query($koneksi, "SELECT MAX(id_toko) as idnew FROM tb_toko");
          $row = mysqli_fetch_array($query);

          $max_id = $row['idnew'];
          $max_ids = (int) substr($max_id, 5, 5);
          $id_toko = $max_ids + 1;
          $auto = $kode . sprintf("%05s", $id_toko);
          ?>
          <p><a href="form-tambah-toko.php?id=<?php echo $auto; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Toko</a></p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keseluruhan Data Toko</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Pemilik</th>
                      <th>Alamat</th>
                      <th>Jarak</th>
                      <th>Deskripsi</th>
                      <th>Telp/WA/Maps</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../../koneksi/koneksi.php";
                    $no = 1;
                    $sql = mysqli_query($koneksi, "SELECT * from tb_toko inner join tb_user on tb_toko.id_user = tb_user.id_user where tb_toko.id_user='$id_user'");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                      <td><?php echo $data['nama_toko']; ?></td>
                      <td><?php echo $data['nama_user']; ?></td>
                      <td><?php echo $data['jalan_toko']; ?>, RT <?php echo $data['rt_toko']; ?> RW <?php echo $data['rw_toko']; ?>, <?php echo $data['desa_toko']; ?>, <?php echo $data['kec_toko']; ?>, <?php echo $data['wil_toko']; ?>, <?php echo $data['prov_toko']; ?>, <?php echo $data['kode_pos']; ?></td>
                      <td><?php echo $data["jarak_toko"]; ?> Km</td>
                      <td><?php echo $data['des_toko']; ?></td>
                      <td><a href="tel:<?php echo $data['telp_toko']; ?>" class='btn btn-warning fa fa-phone' target="_blank"></a><a href="https://web.whatsapp.com/send?text=&phone=<?php echo $data['wa_toko']; ?>" class='btn btn-success fa fa-whatsapp' target="_blank"></a><a href="<?php echo $data['gmaps']; ?>" class='btn btn-info fa fa-map-marker' target="_blank"></a></td>
                      <td>
                        <a href="form-edit-toko.php?id_toko=<?php echo $data['id_toko']; ?>" class='btn btn-warning fa fa-pencil'> Edit</a>
                        <a href="pro-hapus-toko.php?id_toko=<?php echo $data['id_toko']; ?>" onclick="return confirm('Data akan dihapus?');" class='btn btn-danger fa fa-trash-o'> Hapus</a>

                      </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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