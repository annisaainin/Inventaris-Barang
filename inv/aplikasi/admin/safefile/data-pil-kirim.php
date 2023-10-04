<?php
  session_start();
  include "../../koneksi/koneksi.php";
 // error_reporting(0);
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


  <title>The Logistic - Data Pilih Transport</title>

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
              <a href="data-kon-kirim.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-kon-kirim.php"><b>Konfirmasi Pengiriman</b></a> / Pilih Transportasi</li>
          </ol> 
          <!-- Page Heading -->                 
          <!-- DataTales Example -->
          <?php   
          $id_pesanan = $_GET['id_pesanan'];
          $id_kendaraan = $_GET['id_kendaraan'];
                  $data=mysqli_query($koneksi,"SELECT * from tb_pengiriman a right join tb_detail_pengiriman i on a.id_pengiriman=i.id_pengiriman inner join tb_pesanan b on i.id_pesanan=b.id_pesanan inner join tb_user c on b.id_user=c.id_user inner join tb_detail_pesanan d on b.id_pesanan=d.id_pesanan inner join tb_barang e on d.id_barang=e.id_barang inner join tb_toko f on b.id_toko=f.id_toko inner join tb_detail_gambar g on e.id_barang=g.id_lain inner join tb_konfirmasi h on b.id_pesanan=h.id_pesanan  where i.id_pesanan='$id_pesanan' group by i.id_detail_kirim order by i.id_detail_kirim desc limit 1")or die(mysqli_error($koneksi));
                  while ($r=mysqli_fetch_array($data)){ 
                     
                ?>
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Details Kendaraan</h6>
            </a>
            
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample1">
              <div class="card-body">
                        
                  <div class="form-group">
                    <label class="col-lg-9">Kendaraan</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_toko" id="toko" onchange="show_selected()">
                          <option value=""> --- Pilih Kendaraan --- </option>
                              <?php
                                $query3 = mysqli_query($koneksi,"SELECT * FROM tb_pesanan a inner join tb_konfirmasi b on a.id_pesanan=b.id_pesanan inner join tb_detail_pengiriman i on a.id_pesanan=i.id_pesanan inner join tb_pesanan c on i.id_pesanan=c.id_pesanan where i.id_pesanan='$id_pesanan' group by i.id_pesanan order by i.id_pesanan desc");
                                while ($data3=mysqli_fetch_array($query3)){
                                $batas =  $data3['total_berat']; 
                                //$beban =  $data3['beban_kirim'];
                                // $ttlbeban = $data3['total_berat']+$data3['panjang_kendaraan'];
                                 //$pj = $data3['panjang_kendaraan']; 

                                include "../../koneksi/koneksi.php";
                                $query1 = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan where batas_berat>'$batas' AND batas_berat>batas_sementara AND batas_berat>=batas_sementara+'$batas' AND status_kendaraan='0' group by id_kendaraan");
                              }
                                  while ($data1=mysqli_fetch_array($query1)){ 
                                  ?>
                                  <option value="<?php echo $data1['id_kendaraan']; ?>" id="<?php echo $data1['id_kendaraan']; ?>"><?php echo $data1['nama_kendaraan']; ?></option>
                                  <?php
                                  } 
                                ?>
                            </select>
                      </div>
                  </div>      
                  <?php 
                    $kode5 = 'PG';
                    $sql5 = mysqli_query($koneksi,"SELECT MAX(id_pengiriman) as idnew FROM tb_pengiriman");
                    $row5 = mysqli_fetch_array($sql5);
                    $max_id5 = $row5['idnew'];
                    $max_ids5 = (int) substr($max_id5,5,5);
                    $kirim5 = $max_ids5+1;
                    $auto5 = $kode5.sprintf("%05s", $kirim5);

                    $sql4 = mysqli_query($koneksi,"SELECT * FROM tb_pengiriman a inner join tb_detail_pengiriman b on a.id_pengiriman=b.id_pengiriman WHERE a.id_kendaraan2='$id_kendaraan' AND a.tgl_pengiriman='0000-00-00 00:00:00'");
                    $qry4 = (mysqli_num_rows($sql4));
                    $row4 = mysqli_fetch_array($sql4);
                    
                    if($qry4==true){
                         $pgid = $row4['id_pengiriman'];
                        
                    }else{
                        $pgid =$auto5;
                       
                    }

                  ?> 
                  <?php
                    $query2 = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan a inner join tb_detail_pengiriman i inner join tb_pesanan c on i.id_pesanan=c.id_pesanan inner join tb_toko d on c.id_toko=d.id_toko inner join tb_user e on c.id_user=e.id_user where a.id_kendaraan='$id_kendaraan' AND i.id_pesanan='$id_pesanan' group by i.id_pesanan order by i.id_pesanan desc limit 1")or die(mysql_error($koneksi));
                    include "../../koneksi/koneksi.php";
                    while ($data2=mysqli_fetch_array($query2)){
                    ?>
                     <input type="hidden" name="id_toko" min="0" value="<?php echo $_GET['toko']; ?>" class="form-control" readonly>
                  <div class="form-group">
                    <label class="col-lg-9">ID Pengiriman</label>
                      <div class="col-lg-6" >
                        <input class="form-control form-control-user" type="text" name="id_ki" required="" readonly value="<?php echo $pgid; ?>">
                      </div>
                  </div>   
                  <div class="form-group">
                    <label class="col-lg-9">No Polisi</label>
                      <div class="col-lg-6" >
                        <input class="form-control form-control-user" type="text" name="nama_toko" required="" readonly value="<?php echo $data2['no_pol']; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Nama Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" name="telp" value="<?php echo $data2['nama_kendaraan']; ?>" required="" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Merk/Type Kendaraan</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" name="telp" value="<?php echo $data2['merk_kendaraan']; ?> / <?php echo $data2['tipe_kendaraan']; ?>" required="" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Batas Berat</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" value="<?php echo $data2['batas_berat']; ?> Kg" name="jarak_toko" required="" readonly="">
                      </div>
                  </div>
                  <div class="modal-footer">
                  </div>

                     
                  <div class="form-group">
                    <label class="col-lg-9">Nama Toko</label>
                      <div class="col-lg-6" >
                        <input class="form-control form-control-user" type="text" name="nama_toko" required="" readonly value="<?php echo $data2['nama_toko']; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Whatsapp Toko</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" name="telp" value="<?php echo $data2['wa_toko']; ?>" required="" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Telp Toko</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" name="telp" value="<?php echo $data2['telp_toko']; ?>" required="" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Alamat Toko</label>
                      <div class="col-lg-12">
                        <textarea class="form-control form-control-user" name="alamat_toko" placeholder="Masukkan Deskripsi Toko" value="<?php echo $data2['rt_toko']; ?>" readonly=""><?php echo $data2['jalan_toko']; ?>, RT <?php echo $data2['rt_toko']; ?> RW <?php echo $data2['rw_toko']; ?>, <?php echo $data2['desa_toko']; ?>, <?php echo $data2['kec_toko']; ?>, <?php echo $data2['wil_toko']; ?>, <?php echo $data2['prov_toko']; ?>, <?php echo $data2['kode_pos']; ?></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Jarak Toko Kamu ke Toko Pusat Logistic</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" value="<?php echo $data2['jarak_toko']; ?> Km" name="jarak_toko" required="" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Deskripsi Toko</label>
                      <div class="col-lg-12">
                        <textarea class="form-control form-control-user" name="alamat_toko" placeholder="Masukkan Deskripsi Toko" value="<?php echo $data2['des_toko']; ?>" readonly=""><?php echo $data2['des_toko']; ?></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Status Pengiriman</label>
                      <div class="col-lg-6">
                        <a href="#" class='btn btn-success'>Siap Dikirim</a>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <a href="pro-konfirmasi.php?id_konfirmasi=<?php echo $r['id_konfirmasi']; ?>&&kon=kirim&&id_pesanan=<?php echo $r['id_pesanan']; ?>&&id_kendaraan=<?php echo $id_kendaraan; ?>&&order=<?php echo $pgid; ?>" onclick="return confirm('Data akan di konfirmasi Pengiriman??');" class='btn btn-primary fa fa-arrow-circle-right'> Masuk Ke Dalam Truk</a>
                  </div>                    
                  <?php 
                } ?>
              </div>
            </div>
          </div>
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
 <script type="text/javascript">
    function show_selected() {
        var e = document.getElementById("toko");
        var tk = e.options[e.selectedIndex].id;
        window.location = "data-pil-kirim.php?id_kendaraan="+tk+"&&"+"id_pesanan=<?php echo $id_pesanan; ?>";

    }
</script> 
</body>

</html>
