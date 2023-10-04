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


  <title>The Logistic - Data Konfirmasi Pembayaran</title>

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
          <h1 class="h3 mb-2 text-gray-800">Data Konfirmasi Pembayaran</h1>
          <p class="mb-4">Menu yang berisi berbagai data Konfirmasi Pembayaran. Menu ini juga tersedia fitur melakukan konfirmasi pembayaran </p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keseluruhan Data Konfirmasi Pembayaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID Pesanan</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Total Harga</th>
                      <th>Metode Pembayaran</th>
                      <th>Detail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    function rupiah($angka){
            				$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            				return $hasil_rupiah;
            			}
                    include "../../koneksi/koneksi.php";
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * from tb_konfirmasi a inner join tb_pesanan b on a.id_pesanan=b.id_pesanan inner join tb_user c on c.id_user=b.id_user inner join tb_metode_pembayaran d on d.id_metode=b.id_metode inner join tb_toko e on b.id_toko=e.id_toko where a.kon_bayar='1' AND a.kon_kirim='0' AND a.kon_sampai='0' order by a.id_pesanan desc");
                      while ($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['id_pesanan']; ?></td>
                      <td><?php echo $data['tgl_pesanan']; ?></td>
                       <td><?php  echo $data['nama_user']; ?>; 
                                  <br><div style="font-size: 12px">- Nik : <?php echo $data['nip_user']; ?>;</div>
                                  <div style="font-size: 12px">- Toko : <?php echo $data['nama_toko']; ?>;</div><?php
                         ?>
                        
                      </td>
                      <td><?php echo rupiah($data['total_keseluruhan']); ?></td>
                      <td><?php echo $data['nama_metode']; ?></td>
                      
                      <td>
                        <a href="pro-konfirmasi.php?id_konfirmasi=<?php echo $data['id_konfirmasi']; ?>&&kon=bayar&&id_nota=<?php echo $data['id_nota']; ?>" onclick="return confirm('Data akan di konfirmasi pembayaran??');" class='btn btn-warning fa fa-check'> Detail Pesanan</a>
                        <a href="pro-konfirmasi.php?id_konfirmasi=<?php echo $data['id_konfirmasi']; ?>&&kon=bayar&&id_nota=<?php echo $data['id_nota']; ?>" onclick="return confirm('Data akan di konfirmasi pembayaran??');" class='btn btn-info fa fa-check'> Detail User</a>
                      </td>
                      <td>
                        <a href="pro-konfirmasi.php?id_konfirmasi=<?php echo $data['id_konfirmasi']; ?>&&kon=bayar&&id_pesanan=<?php echo $data['id_pesanan']; ?>" onclick="return confirm('Data akan di konfirmasi pembayaran??');" class='btn btn-success fa fa-check'> Approve</a>


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
