<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

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
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                  </div>
                  <?php 
                  session_start();
                  include "koneksi/koneksi.php";
                  
                  if(isset($_COOKIE['cookielogin'])){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_user");
                    while($qry = mysqli_fetch_array($sql)){
                      if(($_COOKIE['cookielogin']['user']==$qry['username_user'])&&($_COOKIE['cookielogin']['pass']==$qry['password_user'])){
                          print_r($_COOKIE);
                          header('Location:aplikasi/admin/');
                      }
                    }
                  }
                  ?>
                  <form class="user" action="pro-login.php" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="in_username" maxlength="25" placeholder="Masukkan Username..." required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="pswda" name="in_password" maxlength="25" placeholder="Masukkan Password..." required="">
                    </div>
                    <div class="form-group">
                      <!-- <label class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="setcookie" value="true" >
                        <label class="custom-control-label" name="setcookie" for="customCheck">Remamber Me??</label>
                      </label> -->
                      <!-- <label class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" id="showhide" for="customCheck">Lihat Password</label>
                      </label> -->
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <!-- <a class="small" href="daftar.php">Belum Punya Akun??</a><br> -->
                    <!-- <a class="small" href="forget-pass.php">Lupa Kata Sandi?</a> -->
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
