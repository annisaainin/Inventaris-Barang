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


  <title>Ikita Store - Data Konfirmasi Sampai</title>

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
          <h1 class="h3 mb-2 text-gray-800">Data Konfirmasi Sampai</h1>
          <p class="mb-4">Menu yang berisi berbagai data Konfirmasi Sampai. Menu ini juga tersedia fitur melakukan konfirmasi Sampai </p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keseluruhan Data Konfirmasi Sampai</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Tanggal Pesanan</th>
                      <th>Customer</th>
                      <th>Toko</th>
                      <th>Tujuan</th>   
                      <th>Proses</th>
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
                    $sql = mysqli_query($koneksi,"SELECT * from tb_konfirmasi a inner join tb_pesanan b on a.id_pesanan=b.id_pesanan inner join tb_user c on c.id_user=b.id_user inner join tb_metode_pembayaran d on d.id_metode=b.id_metode inner join tb_toko e on b.id_toko=e.id_toko inner join tb_detail_pengiriman f on b.id_pesanan=f.id_pesanan left join tb_pengiriman g on f.id_pengiriman=g.id_pengiriman left join tb_kendaraan h on g.id_kendaraan2=h.id_kendaraan where a.kon_bayar='2' AND  a.kon_kirim='2' AND a.kon_sampai='0' || a.kon_sampai='1' order by g.id_kendaraan2 desc");
                    //$sql = mysqli_query($koneksi,"SELECT * from tb_konfirmasi a inner join tb_pesanan b on a.id_pesanan=b.id_pesanan inner join tb_user c on c.id_user=b.id_user inner join tb_metode_pembayaran d on d.id_metode=b.id_metode where a.kon_bayar='2' AND  a.kon_kirim='2' AND a.kon_sampai='0' || a.kon_sampai='1' order by a.id_pesanan desc");
                      while ($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['tgl_pesanan']; ?></td>
                      <td><?php echo $data['nama_user']; ?>; 
                        <br><div style="font-size: 12px">- Nik : <?php echo $data['nip_user']; ?>;</div>
                        <div style="font-size: 12px">- Email : <?php echo $data['email_user']; ?>;</div>
                        <div style="font-size: 12px">- Telp : <?php echo $data['telp_user']; ?>;</div>
                        <div style="font-size: 12px">- Kelamin : <?php echo $data['jenis_kelamin']; ?>;</div>
                      </td>
                      <td><?php echo $data['nama_toko']; ?>; 
                        <br><div style="font-size: 12px">- Telp/Wa : <?php echo $data['telp_toko']; ?>/<?php echo $data['telp_toko']; ?>;</div>
                        <div style="font-size: 12px">- Deskripsi : <?php echo $data['des_toko']; ?>;</div>
                        <div style="font-size: 12px">- Maps : <?php echo $data['gmaps']; ?>;</div>
                      </td>
                      
                      <td>Jln.<?php echo $data['jalan_toko']; ?>, RT <?php echo $data['rt_toko']; ?> RW <?php echo $data['rw_toko']; ?>, Ds.<?php echo $data['desa_toko']; ?>, Kec.<?php echo $data['kec_toko']; ?>, Wil.<?php echo $data['wil_toko']; ?>, Prov.<?php echo $data['prov_toko']; ?>, <?php echo $data['kode_pos']; ?></td>
                      <td>
                         <?php 
                            if($data['kon_sampai']=='0'){
                                ?><a href="#" class='btn btn-warning'>Belum Di ACC</a><?php
                            }else if(($data['kon_sampai']=='1')){
                                ?><a href="#" class='btn btn-success'>Complete</a><?php
                            }
                         ?>
                      </td>
                      <td>

                        <a href="" onclick="return confirm('Data akan di konfirmasi Pengiriman??');" class='btn btn-info fa fa-info-circle'> Detail Pesanan</a>
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
