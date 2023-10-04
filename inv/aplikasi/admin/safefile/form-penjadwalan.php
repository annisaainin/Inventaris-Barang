<?php
session_start();
include "../../koneksi/koneksi.php";
error_reporting(0);
$id_pengiriman = $_GET['id_pengiriman'];

// $query9 = "SELECT * FROM tb_detail_gambar WHERE id_toko='$id_toko'";
// $sql9 = mysqli_query($koneksi, $query9); 
// $data9 = mysqli_fetch_array($sql9);
// for ($i=0; $i < count($data9['id_toko']); $i++) { 
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


  <title>The Logistic - Penjadwalan Truk</title>

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
              <a href="data-pengiriman.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-pengiriman.php"><b>Data Pengiriman</b></a> / Form Penjadwalan</li>
          </ol>
          <!-- Page Heading -->

          <!-- DataTales Example -->
          <?php
                $data = mysqli_query($koneksi, "SELECT * from tb_pengiriman a inner join tb_detail_pengiriman i on a.id_pengiriman=i.id_pengiriman inner join tb_pesanan b on i.id_pesanan=b.id_pesanan inner join tb_kendaraan c on a.id_kendaraan2=c.id_kendaraan inner join tb_konfirmasi d on i.id_pesanan=d.id_pesanan inner join tb_toko e on b.id_toko=e.id_toko WHERE a.id_pengiriman='$id_pengiriman' limit 1")or die(mysqli_error($koneksi));
                while ($r = mysqli_fetch_array($data)) {
                ?>
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Penjadwalan</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                

                  <form action="pro-penjadwalan.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

                    <input class="form-control" type="hidden" name="id_pengiriman" placeholder="ID" value="<?php echo $id_pengiriman; ?>" readonly />
                     <input class="form-control" type="hidden" name="id_kendaraan" placeholder="ID" value="<?php echo $r['id_kendaraan']; ?>" readonly />

                    <div class="form-group">
                      <label class="col-lg-9">Tanggal Penjadwalan</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Penjadwalan" type="datetime-local" name="tgl_pengiriman" required="">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample3">
              <div class="card-body">
                  
                  <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>QTY</th>
                      <th>Harga Satuan</th>
                      <th>Total</th>
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
                    $sql3 = mysqli_query($koneksi,"SELECT *, sum(dp.kuantitas_detail) as sb, sum(dp.detail_total_harga) as dt from tb_barang b inner join tb_jenis_barang j on b.id_jenis_barang=j.id_jenis_barang inner join tb_detail_gambar d on b.id_barang=d.id_lain inner join tb_detail_pesanan dp on b.id_barang=dp.id_barang inner join tb_pesanan f on dp.id_pesanan=f.id_pesanan inner join tb_detail_pengiriman i on f.id_pesanan=i.id_pesanan inner join tb_pengiriman g on i.id_pengiriman=g.id_pengiriman where g.id_pengiriman='$id_pengiriman'  group by dp.id_barang order by dp.id_barang desc")or die(mysqli_error($koneksi));
                      while ($data3 = mysqli_fetch_array($sql3)){
                    ?>
                    <tr>
                      <td><img src="../assets/all/image/<?php echo $data3['file_gambar']; ?>" width="100wpx"></td>
                      <td><?php echo $data3['nama_barang']; ?>, 
                        <br><div style="font-size: 12px">Jenis : <?php echo $data3['nama_jenis_barang']; ?></div>
                        <div style="font-size: 12px">Berat : <?php echo $data3['berat_barang']; ?> kg</div>
                        <div style="font-size: 12px">Lebar : <?php echo $data3['lebar_barang']; ?> M</div>
                        <div style="font-size: 12px">Tinggi : <?php echo $data3['tinggi_barang']; ?> M</div>
                      </td>
                      <td><?php echo $data3['sb']; ?></td>
                      <td><?php echo rupiah($data3["sub_total"]); ?></td>
                      <td><?php echo rupiah($data3["dt"]); ?></td>                   
                    </tr>
                    <?php 
                    $ttlq = $ttlq+$data3["sb"];
                    $ttlk = $ttlk+$data3["dt"];} ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="3"></th>
                      <th>Total QTY :</th>
                      <th><?php echo $ttlq; ?></th>
                    </tr>
                    <tr>
                      <th colspan="3"></th>
                      <th>Total Keseluruhan :</th>
                      <th><?php echo rupiah($ttlk); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
              </div>
            </div>
          </div>
            <?php } ?>
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