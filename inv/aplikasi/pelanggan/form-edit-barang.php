<?php
  session_start();
  include "../../koneksi/koneksi.php";
  //error_reporting(0);
  $id_barang = $_GET['id_barang'];
  
  // $query9 = "SELECT * FROM tb_detail_gambar WHERE id_barang='$id_barang'";
  // $sql9 = mysqli_query($koneksi, $query9); 
  // $data9 = mysqli_fetch_array($sql9);
  // for ($i=0; $i < count($data9['id_barang']); $i++) { 
  //   $i=$i+1;
  // }
  // echo $i;

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
                  $data=mysqli_query($koneksi,"SELECT * from tb_barang b inner join tb_jenis_barang j on b.id_jenis_barang=j.id_jenis_barang inner join tb_gudang g on b.id_gudang=g.id_gudang inner join tb_detail_gambar d on b.id_barang=d.id_lain WHERE b.id_barang='$id_barang' group by b.id_barang");
                  while ($r=mysqli_fetch_array($data)){       
                ?>

                <form action="pro-edit-barang.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-lg-9">Gambar Barang</label>
                      <div class="col-lg-12">
                        <div class="zonne">
                          <div id="preview">
                            <?php
                            $query2 = mysqli_query($koneksi,"SELECT * FROM tb_detail_gambar WHERE id_lain = '$id_barang' ORDER BY id_gambar DESC") or die(mysqli_error($koneksi));
                            $rows = mysqli_num_rows($query2);
                            if($rows > 0){
                              while($data2 = mysqli_fetch_array($query2)){?>
                                <span class="m-img"><img src="../assets/all/image/<?php echo $data2["file_gambar"];?>" class="product-image"/>
                                <a onclick="deleteImage(<?php echo $data2['id_gambar']; ?>)" class="remove"><i class="fa fa-remove"></i></a>
                                </span>
                              <?php }
                            }else{
                              $output = 'upload image';
                            }
                            ?>
                          </div>
                          <div class="upload">
                            <span>+
                              <input type="file" class="btn-file" name="multiple_files" id="multiple_files" multiple / style="display:block">
                            </span>
                          </div>
                        </div>
                      </div>
                  </div>
                  
                   <input class="form-control" type="hidden" name="id_barang" placeholder="ID" value="<?php echo $id_barang; ?>" readonly/>
                  
                  <div class="form-group">
                    <label class="col-lg-9">Nama Barang</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Barang" type="text" value="<?php echo $r['nama_barang']; ?>" name="nama_barang" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Jenis Barang</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="jenis_barang"  required>
                          <option value="<?php echo $r['id_jenis_barang']; ?>"><?php echo $r['nama_jenis_barang']; ?></option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query3 = mysqli_query($koneksi,"SELECT * FROM tb_jenis_barang");
                                  while ($data3=mysqli_fetch_array($query3)){
                                  ?>
                                  <option value="<?php echo $data3['id_jenis_barang']; ?>"><?php echo $data3['nama_jenis_barang']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Lebar Barang (*Centimeter, Meter)</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Lebar Barang" value="<?php echo $r['lebar_barang']; ?>" type="text" name="lebar_barang" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tinggi Barang (*Meter)</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Tinggi Barang" type="text" value="<?php echo $r['tinggi_barang']; ?>" name="tinggi_barang" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Berat Barang (*KG)</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Berat Barang" type="text" value="<?php echo $r['berat_barang']; ?>"  name="berat_barang" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Stok Barang</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Stok Barang" type="text" value="<?php echo $r['stok_barang']; ?>" name="stok_barang" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Harga Barang (RP)</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Harga Barang" type="text" value="<?php echo $r['harga_barang']; ?>"  name="harga_barang" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tanggal Produksi</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Tanggal Produksi"  type="date" value="<?php echo $r['tgl_produksi']; ?>" name="tgl_produksi" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Gudang Penyimpanan</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="gudang_barang"  required>
                          <option value="<?php echo $r['id_gudang']; ?>"><?php echo $r['nama_gudang']; ?></option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query5 = mysqli_query($koneksi,"SELECT * FROM tb_gudang");
                                  while ($data5=mysqli_fetch_array($query5)){
                                  ?>
                                  <option value="<?php echo $data5['id_gudang']; ?>"><?php echo $data5['nama_gudang']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
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
          url:"uploads_drop_image.php?barang=<?php echo $id_barang;?>",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success:function(data)
          {
           $('#preview').load('form-edit-barang.php?id_barang=<?php echo $id_barang; ?>'+' #preview');
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
              $('#preview').load('form-edit-barang.php?id_barang=<?php echo $id_barang;  ?>'+' #preview');
            }
        });
      }

</script>
</body>

</html>
