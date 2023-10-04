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


  <title>The Logistic - Tambah Barang</title>

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
            <li><a href="data-barang.php"><b>Data Barang</b></a> / Tambah Barang</li>
          </ol> 
          <!-- Page Heading -->                 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <form action="pro-tambah-barang.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  
                  <?php 
                  //$kode = 'BR';
                  $query = mysqli_query($koneksi,"SELECT MAX(noseri) as idnew FROM barang");
                  $row = mysqli_fetch_array($query);

                  $max_id = $row['idnew'];
                  $max_ids = (int) substr($max_id,5,5);
                  $noseri = $max_ids+1;
                  //$auto = $kode.sprintf("%05s", $noseri);
                  ?>
                                                    
                  <div class="form-group">
                    <label class="col-lg-9">Nomor Seri Barang</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nomor Seri" type="varchar" name="noseri" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Gambar Barang</label>
                      <div class="col-lg-6">
                        <input type="file" name="file_gambar" style="display:block">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tipe Barang</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="tipe_barang"  required>
                          <option value=""> --- Pilih Tipe Barang --- </option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query = mysqli_query($koneksi,"SELECT * FROM tipe_barang");
                                  while ($data=mysqli_fetch_array($query)){
                                  ?>
                                  <option value="<?php echo $data['tipe_barang']; ?>"><?php echo $data['tipe_barang']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>  
                  <div class="form-group">
                    <label class="col-lg-9">Nama Barang</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Barang" type="text" name="nama_barang" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Jenis Barang</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_jenis"  required>
                          <option value=""> --- Pilih Jenis Barang --- </option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query = mysqli_query($koneksi,"SELECT * FROM jenis_barang");
                                  while ($data=mysqli_fetch_array($query)){
                                  ?>
                                  <option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['jenis_barang']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>        
                  <!-- <div class="form-group">
                    <label class="col-lg-9">Jumlah Barang</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Jumlah Barang" type="int" name="jumlah" required="">
                      </div>
                  </div> -->
                  <input class="form-control" type= "hidden" name="jumlah" placeholder="ID" value="<?php echo $jumlah; ?>" readonly />
                  <div class="form-group">
                    <label class="col-lg-9">Kondisi</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_kondisi"  required>
                          <option value=""> --- Pilih Kondisi Barang --- </option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query = mysqli_query($koneksi,"SELECT * FROM kondisi_barang");
                                  while ($data=mysqli_fetch_array($query)){
                                  ?>
                                  <option value="<?php echo $data['id_kondisi']; ?>"><?php echo $data['jenis_kondisi']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-9">Lokasi</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Lokasi Barang" type="varchar" name="lokasi" required="">
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

  <script type="text/javascript">
  $(document).ready(function(){
       $('#multiple_files').change(function(){
        var error_images = '';
        var form_data = new FormData();
        var files = $('#multiple_files')[0].files;
        if(files.length > 10)
        {
         error_images += 'You can not select more than 10 files';
        }
        else
        {
         for(var i=0; i<files.length; i++)
         {
          var name = document.getElementById("multiple_files").files[i].name;
          var ext = name.split('.').pop().toLowerCase();
          if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1)
          {
           error_images += 'Invalid type file';
          }
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
          var f = document.getElementById("multiple_files").files[i];
          var fsize = f.size||f.fileSize;
          if(fsize > 2000000)
          {
           error_images += 'File Size is very big';
          }
          else
          {
           form_data.append("file[]",document.getElementById('multiple_files').files[i]);
          }
         }
        }
        if(error_images == '')
        {
         $.ajax({
          url:"uploads_drop_image.php?barang=<?php echo $auto;?>",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success:function(data)
          {
           $('#preview').load('form-tambah-barang.php?id=<?php echo $max_id; ?>'+' #preview');
          }
         });
        }
        else
        {
         alert(error_images);
         return false;
        }
       });
      });


  function deleteImage(id_gambar) {
        $.ajax({
            url: "delete.php",
            type: "GET",
            data:{id_gambar:id_gambar},
            success: function () {
              $('#preview').load('form-tambah-barang.php?id_gambar=<?php echo $max_id; ?>'+' #preview');
            }
        });
      }

</script>
</body>

</html>
