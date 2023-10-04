<?php
  session_start();
  include "../../koneksi/koneksi.php";
  //error_reporting(0);
  
  
  // $query9 = "SELECT * FROM tb_detail_gambar WHERE id_barang='$id_barang'";
  // $sql9 = mysqli_query($koneksi, $query9); 
  // $data9 = mysqli_fetch_array($sql9);
  // for ($i=0; $i < count($data9['id_barang']); $i++) { 
  //   $i=$i+1;
  // }
  // echo $i;

  $id_user2 = $_SESSION['id_user'];
  $sql = mysqli_query($koneksi, "SELECT * from tb_user where id_user='$id_user2'");
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


  <title>Ikita Store - Edit User</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/fonts-googleapis.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/frola/css/froala_editor.css">
  <link rel="stylesheet" href="../assets/frola/css/froala_style.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/code_view.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/draggable.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/colors.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/emoticons.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/image_manager.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/image.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/table.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/char_counter.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/video.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/file.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/help.css">
  <link rel="stylesheet" href="../assets/frola/css/third_party/spell_checker.css">
  <link rel="stylesheet" href="../assets/frola/css/plugins/special_characters.css">
  <link rel="stylesheet" href="../assets/frola/tambahan/codemirror.min.css">
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
              <a href="javascript:history.go(-1)">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="javascript:history.go(-1)"><b>Data User</b></a> / Edit User</li>
          </ol> 
          <!-- Page Heading -->                 
          <!-- DataTales Example -->
          <?php 
            $id_user = $_GET['id_user'];
            $data=mysqli_query($koneksi,"SELECT * from tb_user u inner join tb_hak_akses h on u.id_hak_akses=h.id_hak_akses inner join tb_jenis_kelamin k on u.id_jenis_kelamin=k.id_jenis_kelamin inner join tb_status s on u.id_status=s.id_status WHERE u.id_user='$id_user' group by u.id_user")or die(mysqli_error($koneksi));
            while ($r=mysqli_fetch_array($data)){       
          ?>

          <form action="pro-edit-user_baru.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Diri</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">


                  <div class="form-group">
                    <label class="col-lg-9">Gambar Produk</label>
                      <div class="col-lg-12">
                        <div class="zonne">
                          <div id="preview">
                            <?php
                            $query2 = mysqli_query($koneksi,"SELECT * FROM tb_detail_gambar WHERE id_lain = '$id_user' ORDER BY id_gambar DESC") or die(mysqli_error($koneksi));
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
                  
                   <input class="form-control" type="hidden" name="id_user" placeholder="ID" value="<?php echo $r['id_user']; ?>" readonly/>
                   <input class="form-control" type="hidden" name="user_in" placeholder="ID" value="<?php echo $id_user2; ?>" readonly/>
                  <div class="form-group">
                    <label class="col-lg-9">NIP</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan NIP" type="text" value="<?php echo $r['nip_user']; ?>" name="nip_user" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Nama</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama" type="text" value="<?php echo $r['nama_user']; ?>" name="nama_user" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Alamat</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Alamat" type="text" value="<?php echo $r['alamat_user']; ?>" name="alamat_user" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Email</label>
                      <div class="col-lg-9">
                        <input class="form-control form-control-user" placeholder="Masukkan Email" type="text" value="<?php echo $r['email_user']; ?>" name="email_user" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Telp</label>
                      <div class="col-lg-9">
                        <input class="form-control form-control-user" placeholder="Masukkan Telp" type="text" value="<?php echo $r['telp_user']; ?>" name="telp_user" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Tanggal Lahir</label>
                      <div class="col-lg-9">
                        <input class="form-control form-control-user" placeholder="Masukkan Tanggal" value="<?php echo $r['ttl_user']; ?>" type="date" name="ttl_user" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Jenis Kelamin</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_jenis_kelamin"  required>
                          <option value="<?php echo $r['id_jenis_kelamin']; ?>"> <?php echo $r['nama_kelamin']; ?></option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query4 = mysqli_query($koneksi,"SELECT * FROM tb_jenis_kelamin");
                                  while ($data4=mysqli_fetch_array($query4)){
                                  ?>
                                  <option value="<?php echo $data4['id_jenis_kelamin']; ?>"><?php echo $data4['nama_kelamin']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Status</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_status"  required>
                          <option value="<?php echo $r['id_status']; ?>"><?php echo $r['jenis_status']; ?></option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query5 = mysqli_query($koneksi,"SELECT * FROM tb_status");
                                  while ($data5=mysqli_fetch_array($query5)){
                                  ?>
                                  <option value="<?php echo $data5['id_status']; ?>"><?php echo $data5['jenis_status']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div> 
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Penting</h6>
            </a>
              <div class="collapse show" id="collapseCardExample2">
                <div class="card-body">
                  <div class="form-group">
                    <label class="col-lg-9">Username</label>
                      <div class="col-lg-12">
                        <input class="form-control form-control-user" placeholder="Masukkan Username" type="text" value="<?php echo $r['username_user']; ?>" name="username_user" required="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Hak Akses</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_hak_akses" required>
                          <option value="<?php echo $r['id_hak_akses']; ?>"><?php echo $r['jenis_hak_akses']; ?></option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query6 = mysqli_query($koneksi,"SELECT * FROM tb_hak_akses");
                                  while ($data6=mysqli_fetch_array($query6)){
                                  ?>
                                  <option value="<?php echo $data6['id_hak_akses']; ?>"><?php echo $data6['jenis_hak_akses']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <a href="../../forget-pass.php" class="btn btn-warning">Lupa Kata Sandi??</a> 
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
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
  <script type="text/javascript" src="../assets/frola/tambahan/codemirror.min.js"></script>
  <script type="text/javascript" src="../assets/frola/tambahan/xml.min.js"></script>

  <script type="text/javascript" src="../assets/frola/js/froala_editor.min.js" ></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="../assets/frola/js/plugins/word_paste.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){
       $('#multiple_files').change(function(){
        var error_images = '';
        var form_data = new FormData();
        var files = $('#multiple_files')[0].files;
        if(files.length > 1)
        {
         error_images += 'You can not select more than 1 files';
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
          url:"uploads_drop_image.php?barang=<?php echo $id_user;?>",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success:function(data)
          {
           $('#preview').load('form-edit-user.php?id_user=<?php echo $id_user; ?>'+' #preview');
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
              $('#preview').load('form-edit-user.php?id_user=<?php echo $id_user; ?>'+' #preview');
            }
        });
      }

</script>
</body>

</html>
