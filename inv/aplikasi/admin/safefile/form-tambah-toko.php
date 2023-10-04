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


  <title>The Logistic - Tambah Toko</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/fonts-googleapis.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="../assets/autocomplete.css" rel="stylesheet" type="text/css"> -->

  <link rel="stylesheet" type="text/css" href="../assets/css/uploads-image.css">
  <style>
        .pemilik {
            padding: 5px 8px;
            border-radius: 5px;
            box-shadow: 0 0 2px 1px #FAFAFA;
            border: 1px solid #DFDFDF;
        }
    </style>
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
              <a href="data-toko.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-toko.php"><b>Data Toko</b></a> / Tambah Toko</li>
          </ol> 
          <!-- Page Heading -->                 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Toko</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <form action="pro-tambah-toko.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  
                  <?php 
                  $kode = 'TK';
                  $query = mysqli_query($koneksi,"SELECT MAX(id_toko) as idnew FROM tb_toko");
                  $row = mysqli_fetch_array($query);

                  $max_id = $row['idnew'];
                  $max_ids = (int) substr($max_id,5,5);
                  $id_toko = $max_ids+1;
                  $auto = $kode.sprintf("%05s", $id_toko);
                  ?>
                 

                   
                  <input class="form-control" type="hidden" name="id_toko" placeholder="ID" value="<?php echo $auto; ?>" readonly/>
                  <!-- <input class="form-control" type="hidden" name="id_user" placeholder="ID" value="<?php echo $id_user; ?>" readonly/> -->
                  
                  <div class="form-group">
                    <label class="col-lg-9">Nama Toko</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Toko" type="text" name="nama_toko" required="">
                      </div>
                  </div>     

                  <!-- <div class="form-group">
                    <label class="col-lg-9">Nama Pemilik</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user pemilik" data-autocomplete data-autocomplete-source="list.php" placeholder="Masukkan Nama Pemilik" type="text" name="nama_pemilik" required="">

                      </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-lg-9">Nama Pemilik</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="nama_pemilik"  required>
                          <option value=""> --- Pilih Nama Pemilik --- </option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query = mysqli_query($koneksi,"SELECT * FROM tb_user where id_hak_akses='HK00002'");
                                  while ($data=mysqli_fetch_array($query)){
                                  ?>
                                  <option value="<?php echo $data['id_user']; ?>"><?php echo $data['nama_user']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div> 
                  
                  <div class="form-group">
                    <label class="col-lg-9">Telp Toko</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Telp Toko" type="tel" name="telp_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Whatsapp</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Whatsapp" type="tel" name="wa_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">RT</label>
                      <div class="col-lg-3">
                        <input class="form-control form-control-user" placeholder="Masukkan RT Toko" type="number" name="rt_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">RW</label>
                      <div class="col-lg-3">
                        <input class="form-control form-control-user" placeholder="Masukkan RW Toko" type="number" name="rw_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Nama Jalan</label>
                      <div class="col-lg-12">
                        <textarea class="form-control form-control-user" name="jalan_toko" placeholder="Masukkan Nama Jalan" ></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Nama Desa</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Desa Toko" type="text" name="desa_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Nama Kecamatan</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Kecamatan Toko" type="text" name="kec_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Nama Wilayah</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Wilayah Toko" type="text" name="wil_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Nama Provinsi</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Provinsi Toko" type="text" name="prov_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Kode Pos</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Kode Pos" type="text" name="kode_pos" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Deskripsi Toko</label>
                      <div class="col-lg-12">
                        <textarea class="form-control form-control-user" name="des_toko" placeholder="Masukkan Deskripsi Toko"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Jarak Ke Pusat Logistik</label>
                      <div class="col-lg-3">
                        <input class="form-control form-control-user" placeholder="Masukkan Jarak Toko" type="number" name="jarak_toko" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Google Maps</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Link Google Maps" type="text" name="gmaps" required="">
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
<!--   <script src="../assets/autocomplete.js"></script>
  <script type="text/javascript">
        var element = document.querySelector('input[name="nama_pemilik"]');
        var autoComplete = new AutoComplete(element);

        element.onkeyup = function () {
            autoComplete.getSuggestionList();
        }
    </script> -->
 </body>

</html>
