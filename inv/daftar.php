<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ikita Store</title>

  <!-- Custom fonts for this template-->
  <link href="aplikasi/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="aplikasi/assets/vendor/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="aplikasi/assets/css/fonts-googleapis.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="aplikasi/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Sign Up</h1>
                  </div>
                  
                  <form class="user" action="pro-daftar.php" method="POST">

                    <?php 
                  include "koneksi/koneksi.php";
                  
                  $kode = 'US';
                  $query = mysqli_query($koneksi,"SELECT MAX(id_user) as idnew FROM tb_user");
                  $row = mysqli_fetch_array($query);

                  $max_id = $row['idnew'];
                  $max_ids = (int) substr($max_id,5,5);
                  $id_user = $max_ids+1;
                  $auto = $kode.sprintf("%05s", $id_user);
                  ?>

                    <input class="form-control" type="hidden" name="id_user" placeholder="ID" value="<?php echo $auto; ?>" readonly/> 
                                    
                    <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Nomor Induk Pegawai" type="text" name="nip_user" required="">
                    </div>
                    <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Nama" type="text" name="nama_user" required="">
                    </div>
                    <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Alamat" type="text" name="alamat_user" required="">
                    </div>
                     <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Email" type="Email" name="email_user" required="">
                    </div>
                     <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Nomor Telepon" type="text" name="telp_user" required="">
                    </div>
                     <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Tanggal Lahir" type="date" name="ttl_user" required="">
                    </div>
                     <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Username" type="text" name="username_user" required="">
                    </div>
                     <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Password" type="password" name="password_user" required="">
                    </div>
                     <div class="form-group">
                      <input class="form-control form-control-user" placeholder="Jenis Kelamin" type="text" name="jenis_kelamin" required="">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Sign Up
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="index.php">Ke Halaman Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="aplikasi/assets/vendor/jquery/jquery.min.js"></script>
  <script src="aplikasi/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="aplikasi/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="aplikasi/assets/js/sb-admin-2.min.js"></script>
  <script src="aplikasi/assets/js/tampilpassword.js" type="text/javascript"></script>
</body>

</html>
