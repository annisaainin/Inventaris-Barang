<?php
  session_start();
  include "../../koneksi/koneksi.php";
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
        <div class="container-fluid">
          <!-- <ol class="breadcrumb">
        <li><a href="data-berita.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Data Berita</li>
        <li class="active">Data Semua Berita</li>
      </ol> -->
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Perawatan</h1>
            <a href="laporan-perawatan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Data Laporan</a>
          </div>

          <?php 
            $kode = 'KP';
            $query = mysqli_query($koneksi,"SELECT MAX(kode_perawatan) as idnew FROM perawatan");
            $row = mysqli_fetch_array($query);

            $max_id = $row['idnew'];
            $max_ids = (int) substr($max_id,5,5);
            $id_barang = $max_ids+1;
            $auto = $kode.sprintf("%05s", $id_barang);
          ?>
          <!-- <p><a href="form-data-rawat.php?id=<?php echo $auto; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Perawatan</a></p>           -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keseluruhan Data Perawatan Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <!-- <th>Kode</th> -->
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Tanggal Perawatan</th>
                      <th>Tanggal Selesai</th>
                      <th>Kondisi</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../../koneksi/koneksi.php";
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * from perawatan b inner join kondisi_barang r on b.id_kondisi=r.id_kondisi inner join status_rawat j on b.id_status=j.id_status");
                      while ($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <!-- <td><?php echo $data['kode_perawatan']; ?></td> -->
                      <td><?php echo $data['noseri']; ?></td>                      
                      <td><?php echo $data['jumlah']; ?></td>
                      <td><?php echo $data['tgl_perawatan']; ?></td>
                      <td><?php echo $data['tgl_selesai']; ?></td>
                      <td><?php echo $data['jenis_kondisi']; ?></td>
                      <td>
                      <?php 
                            if($data['id_status']=='1'){
                                ?><a href="#" class='btn btn-danger'>Dalam Perbaikan</a><?php
                            }else if(($data['id_status']=='2')){
                                ?><a href="#" class='btn btn-success'>Sudah Diperbaiki</a><?php
                            }else if(($data['id_status']=='3')){
                              ?><a href="#" class='btn btn-warning'>Proses Penghapusan</a><?php
                          }
            
                         ?>
                      </td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td>
                        <!-- <a href="javascript:void(0);" id='<?php echo $data['id_barang']; ?>' class='btn btn-success fa fa-eye open_modal'> Detail</a> -->
                        <!-- <a href="#" class='btn btn-success fa fa-eye'> Lihat</a> -->
                        <a href="form-edit-data-perawatan.php?kode_perawatan=<?php echo $data['kode_perawatan']; ?>" class='btn btn-warning fa fa-pencil'></a>
                        <a href="pro-hapus-perawatan.php?kode_perawatan=<?php echo $data['kode_perawatan']; ?>" onclick="return confirm('Data akan dihapus?');" class='btn btn-danger fa fa-trash-o'></a>

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
