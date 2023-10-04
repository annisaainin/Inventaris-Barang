<?php
  session_start();
  include "../../koneksi/koneksi.php";
  error_reporting(0);
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


  <title>The Logistic - Data Cart</title>

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
          <h1 class="h3 mb-2 text-gray-800">Data Cart</h1>
          <p class="mb-4">Menu yang berisi berbagai data baranag. Menu ini juga tersedia fitur tambah cart, edit dan hapus. </p>       
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keseluruhan Data Cart</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Pilih</th>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Stok</th>
                      <th>Harga Satuan</th>
                      <th>Total</th>
                      <th>QTY</th>
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
                    $sql = mysqli_query($koneksi,"SELECT * from tb_barang b inner join tb_jenis_barang j on b.id_jenis_barang=j.id_jenis_barang inner join tb_detail_gambar d on b.id_barang=d.id_lain inner join tb_detail_pesanan dp on b.id_barang=dp.id_barang where dp.id_user='$id_user' AND dp.id_pesanan='-' group by b.id_barang  order by b.id_barang desc");
                      while ($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td><input class="form-control form-control-sm" type="checkbox" name="nama_cart"></td>
                      <td><img src="../assets/all/image/<?php echo $data['file_gambar']; ?>" width="100wpx"></td>
                      <td><?php echo $data['nama_barang']; ?>, 
                        <br><div style="font-size: 12px">Jenis : <?php echo $data['nama_jenis_barang']; ?></div>
                        <div style="font-size: 12px">Berat : <?php echo $data['berat_barang']; ?> kg</div>
                        <div style="font-size: 12px">Lebar : <?php echo $data['lebar_barang']; ?> M</div>
                        <div style="font-size: 12px">Tinggi : <?php echo $data['tinggi_barang']; ?> M</div>
                      </td>
                      <td><?php echo $data['stok_barang']; ?></td>
                      <td><?php echo rupiah($data["sub_total"]); ?></td>
                      <td><?php echo rupiah($data["detail_total_harga"]); ?></td>
                      <form action="pro-t-cart.php" method="POST">
                        <td><input type="number" name="kuantitas" class="form-control form-control-sm" min="1" max="<?php echo $data['stok_barang']; ?>"  value="<?php echo $data['kuantitas_detail']; ?>">
                        <input class="form-control" type="hidden" name="cart" value="<?php echo $data['id_barang']; ?>" readonly/></td>
                        <td>
                          <button class='btn btn-success fa fa-cart-plus' type="submit" name="cart">
                             Beli
                          </button>
                          </form>
                          <a href="pro-hapus-barang.php?id_barang=<?php echo $data['id_barang']; ?>" onclick="return confirm('Data akan dihapus?');" class='btn btn-danger fa fa-trash-o'> Hapus</a>
                        </td>
                    </tr>
                    <?php 

                    $qty = $qty+$data['kuantitas_detail'];
                    $total = $total+$data['detail_total_harga'];
                  } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="6"></th>
                      <th>Total Qty :</th>
                      <th><?php echo $qty; ?></th>
                    </tr>
                    <tr>
                      <th colspan="6"></th>
                      <th>Total Harga :</th>
                      <th><?php echo rupiah($total); ?></th>
                    </tr>
                    <tr>
                      <td colspan="8" align="right"><a href="checkout.php" class='btn btn-info fa fa-shopping-basket'> Beli Sekarang</a></td>
                    </tr>
                  </tfoot>
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
