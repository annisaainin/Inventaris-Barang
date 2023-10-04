<?php
  session_start();
  include "../../koneksi/koneksi.php";
  //error_reporting(0);
  $kode_perawatan = $_GET['kode_perawatan'];
  
  // $query9 = "SELECT * FROM tb_detail_gambar WHERE id_barang='$id_barang'";
  // $sql9 = mysqli_query($koneksi, $query9); 
  // $data9 = mysqli_fetch_array($sql9);
  // for ($i=0; $i < count($data9['id_barang']); $i++) { 
  //   $i=$i+1;
  // }
  // echo $i;

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


  <title>Ikita Store - Edit Barang</title>

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
            <li><a href="data-barang.php"><b>Data Barang</b></a> / Edit Barang</li>
          </ol> 
          <!-- Page Heading -->                 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <?php 
                  $data=mysqli_query($koneksi,"SELECT b.kode_perawatan, b.noseri, b.jumlah, b.tgl_perawatan, b.tgl_selesai, b.keterangan, j.id_status, r.jenis_kondisi from perawatan b inner join barang a inner join kondisi_barang r on a.id_kondisi=r.id_kondisi inner join status_rawat j on b.id_status=j.id_status WHERE b.kode_perawatan='$kode_perawatan' group by b.kode_perawatan");
                  while ($r=mysqli_fetch_array($data)){       
                ?>

                <form action="pro-edit-perawatan.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  
                <input class="form-control" type="hidden" name="kode_perawatan" placeholder="ID" value="<?php echo $kode_perawatan; ?>" readonly/>  
                <div class="form-group">
                    <label class="col-lg-9">Nomor Seri</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Barang" type="varchar" value="<?php echo $r['noseri']; ?>" name="noseri" required="" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Jumlah Barang</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Jumlah Barang" type="int" value="<?php echo $r['jumlah']; ?>" name="jumlah" required="" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tanggal Perawatan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Barang" type="date" value="<?php echo $r['tgl_perawatan']; ?>" name="tgl_perawatan" required="" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tanggal Selesai</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Barang" type="date" value="<?php echo $r['tgl_selesai']; ?>" name="tgl_selesai" required="">
                      </div>
                  </div>                          
                  <div class="form-group">
                    <label class="col-lg-12">Kondisi Barang</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_kondisi"  required>
                          <option value=""><?php echo $r['jenis_kondisi']; ?></option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query5 = mysqli_query($koneksi,"SELECT * FROM kondisi_barang");
                                  while ($data5=mysqli_fetch_array($query5)){
                                  ?>
                                  <option value="<?php echo $data5['id_kondisi']; ?>"><?php echo $data5['jenis_kondisi']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Status Barang</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_status"  required>
                          <option value=""><?php if($r['id_status']=='1'){
                                ?>Dalam Perbaikan<?php
                            }else if(($r['id_status']=='2')){
                                ?>Sudah Diperbaiki<?php
                            }else if(($r['id_status']=='3')){
                              ?>Proses Penghapusan</a><?php
                          }; ?></option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query5 = mysqli_query($koneksi,"SELECT * FROM status_rawat");
                                  while ($data5=mysqli_fetch_array($query5)){
                                  ?>
                                  <option value="<?php echo $data5['id_status']; ?>"><?php echo $data5['jenis_status']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-9">Keterangan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Lokasi" type="varchar" value="<?php echo $r['keterangan']; ?>" name="keterangan" required="">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
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
