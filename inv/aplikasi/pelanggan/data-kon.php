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


  <title>The Logistic - Data Konfirmasi</title>

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
          <h1 class="h3 mb-2 text-gray-800">Data Konfirmasi</h1>
          <p class="mb-4">Menu yang berisi berbagai data Konfirmasi. Menu ini juga tersedia fitur melakukan konfirmasi</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keseluruhan Data Konfirmasi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Proses</th>
                      <th>Tanggal</th>
                      <th>Konfirmasi</th>
                      <th>Keterangan</th>
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
                    $id_pesanan = $_GET['id_pesanan'];
                    $sql = mysqli_query($koneksi,"SELECT * from tb_konfirmasi a inner join tb_pesanan b on a.id_pesanan=b.id_pesanan inner join tb_user c on c.id_user=b.id_user inner join tb_toko d on d.id_toko=b.id_toko where b.id_user='$id_user' AND a.id_pesanan='$id_pesanan' group by a.id_pesanan order by a.id_pesanan desc");
                      while ($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td>Pembayaran</td>
                      <td><?php 
                        if($data['tgl_bayar']!='0000-00-00 00:00:00'){
                            echo date("d-m-Y G:i", strtotime($data['tgl_bayar']));
                        }else{
                            echo "-";
                        } ?></td>
                      <td>
                        <?php 
                                if($data['kon_bayar']=='0'){
                                ?>
                                    <a class="btn btn-primary" href="pro-konfirmasi.php?id_pesanan=<?php echo $data['id_pesanan']; ?>&&kon=bayar" onclick="return confirm('Apakah Anda yakin Melakukan Konfirmasi?');">Setujui</a>
                                <?php
                                }else if(($data['kon_bayar']=='0')&&($data['kon_sampai']=='0')||($data['kon_sampai']=='1')||($data['kon_sampai']=='2')&&($data['kon_kirim']=='0')||($data['kon_kirim']=='1')||($data['kon_kirim']=='2')){
                                    echo "-";
                                }else{
                                    echo "-";
                                }
                            ?></td>
                      <td><?php 
                                if($data['kon_bayar']=='0'){
                                    echo "Lakukan konfirmasi setelah melakukan transaksi pembayaran";
                                }else if($data['kon_bayar']=='1'){
                                    echo "Tunggu konfirmasi pembayaran dari The logistic";
                                }else if($data['kon_bayar']=='2'){
                                    echo "Transaksi telah di konfirmasi oleh The logistic";
                                }else{
                                    echo "Terjadi Kesalahan";
                                }
                            ?></td>
                    </tr>
                    <tr>
                      <td>Pengiriman</td>
                      <td><?php 
                        if($data['tgl_kirim']!='0000-00-00 00:00:00'){
                            echo date("d-m-Y G:i", strtotime($data['tgl_kirim']));
                        }else{
                            echo "-";
                        } ?></td>
                      <td>-</td>
                      <td><?php 
                                if(($data['kon_kirim']=='0')&&($data['kon_bayar']=='0')||($data['kon_bayar']=='1')){
                                    echo "-";
                                }else if($data['kon_kirim']=='0'){
                                    echo "Proses Packing Pesanan";
                                }else if($data['kon_kirim']=='1'){
                                    echo "Pesanan dalam perjalanan pengiriman";
                                }else if($data['kon_kirim']=='2'){
                                    echo "Pesanan sampai dalam tujuan";
                                }else{
                                    echo "Terjadi Kesalahan";
                                }
                            ?></td>
                    </tr>
                    <tr>
                      <td>Produk Diterima</td>
                      <td><?php 
                        if($data['tgl_sampai']!='0000-00-00 00:00:00'){
                            echo date("d-m-Y G:i", strtotime($data['tgl_sampai']));
                        }else{
                            echo "-";
                        } ?></td>
                      <td><?php 
                                if(($data['kon_sampai']=='0')&&($data['kon_bayar']=='2')&&($data['kon_kirim']=='2')){
                                    ?>
                                    <a class="btn btn-primary" href="pro-konfirmasi.php?id_pesanan=<?php echo $data['id_pesanan']; ?>&&kon=sampai" onclick="return confirm('Apakah Anda yakin Melakukan Konfirmasi?');">Setujui</a>
                                    <?php
                                }else{
                                    echo "-";
                                }
                            ?></td>
                      <td><?php 
                                if(($data['kon_sampai']=='0')&&($data['kon_bayar']=='2')&&($data['kon_kirim']=='2')){
                                    echo "Lakukan konfirmasi jika pesanan sudah sampai di rumah anda";
                                }else if($data['kon_sampai']=='1'){
                                    echo "Complete";
                                }else{
                                    echo "-";
                                }
                            ?></td>
                    </tr>
                    <?php 
                    $toko = $data['nama_toko'];
                  } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan='1'></th>
                      <th>ID Pesanan</th>
                      <th><?php echo $id_pesanan; ?></th>
                      <th></th>
                    </tr>
                    <tr>
                      <th colspan='1'></th>
                      <th>Nama Toko</th>
                      <th><?php echo $toko; ?></th>
                      <th><a href="cetak-nota.php?id_pesanan=<?php echo $id_pesanan; ?>" class='btn btn-primary fa fa-print'> Cetak Nota</a></th>
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
