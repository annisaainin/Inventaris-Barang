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


  <title>Ikita Store - Data User</title>

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
          <h1 class="h3 mb-2 text-gray-800">Data User
          <?php
            $hk = $_GET['hk'];
            $sql3 = mysqli_query($koneksi,"SELECT * from tb_hak_akses where id_hak_akses='$hk'");
            while ($data3 = mysqli_fetch_array($sql3)){
              echo $data3['jenis_hak_akses'];
            } ?>
          </h1>
          <p class="mb-4">Menu yang berisi berbagai data user. Menu ini juga tersedia fitur tambah user, edit dan hapus. </p>

          <?php 
            $kode = 'US';
            $query2 = mysqli_query($koneksi,"SELECT MAX(id_user) as idnew FROM tb_user");
            $row2 = mysqli_fetch_array($query2);

            $max_id = $row2['idnew'];
            $max_ids = (int) substr($max_id,3,3);
            $id_user = $max_ids+1;
            $auto = $kode.sprintf("%04s", $id_user);
          ?>
          <p><a href="form-tambah-user.php?id_user=<?php echo $auto; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a></p>          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keseluruhan Data User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>Telp</th>
                      <th>Kelamin</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../../koneksi/koneksi.php";
                    $hk = $_GET['hk'];
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * from tb_user u inner join tb_hak_akses h on u.id_hak_akses=h.id_hak_akses inner join tb_jenis_kelamin k on u.id_jenis_kelamin=k.id_jenis_kelamin inner join tb_status s on u.id_status=s.id_status where h.id_hak_akses='$hk' order by u.id_user desc");
                      while ($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['nama_user']; ?></td>
                      <td><?php echo $data['alamat_user']; ?></td>
                      <td><?php echo $data['email_user']; ?></td>
                      <td><?php echo $data['telp_user']; ?></td>
                      <td><?php echo $data['nama_kelamin']; ?></td>
                      <td>
                        <a href="javascript:void(0);" id='<?php echo $data['id_user']; ?>' class='btn btn-success fa fa-eye open_modal'> Detail</a>
                        <a href="form-edit-user.php?id_user=<?php echo $data['id_user']; ?>" class='btn btn-warning fa fa-pencil'> Edit</a>
                        <a href="pro-hapus-user.php?id_user=<?php echo $data['id_user']; ?>&&hk=<?php echo $hk; ?>" onclick="return confirm('Data akan dihapus?');" class='btn btn-danger fa fa-trash-o'> Hapus</a>

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
  <script type="text/javascript">
    $(document).ready(function (){
                $("#dataTable").on('click','.open_modal', function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "modal-detail-user.php",
                        type: "GET",
                        data : {id_user: m,},
                        success: function (ajaxData){
                            $("#ModalDetail").html(ajaxData);
                            $("#ModalDetail").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
  </script>

</body>

</html>
