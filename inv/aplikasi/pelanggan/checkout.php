<?php
  session_start();
  include "../../koneksi/koneksi.php";
  error_reporting(0);
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


  <title>Ikita Store - Edit Cart</title>

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
              <a href="data-cart.php">
                <em class="fa fa-home"></em>
              </a>
            </li>
            <li><a href="data-cart.php"><b>Data Cart</b></a> / Checkout</li>
          </ol> 
          <!-- Page Heading -->                 
          <!-- DataTales Example -->
          <form action="pro-t-checkout.php" class="form-horizontal" method="POST" name="form"  enctype="multipart/form-data">
          <?php 

                  $kode4 = 'PS';
                  $query4 = mysqli_query($koneksi,"SELECT MAX(id_pesanan) as idnew FROM tb_pesanan");
                  $row4 = mysqli_fetch_array($query4);
                  $max_id4 = $row4['idnew'];
                  $max_ids = (int) substr($max_id4,5,5);
                  $id_nota4 = $max_ids+1;
                  $auto4 = $kode4.sprintf("%05s", $id_nota4);
          
                  date_default_timezone_set("Asia/Jakarta");
                  $sekarang = date("Y-m-d G:i:s", strtotime("now"));

                  $data=mysqli_query($koneksi,"SELECT * from tb_detail_pesanan dp inner join tb_barang b on dp.id_barang=b.id_barang inner join tb_jenis_barang j on b.id_jenis_barang=j.id_jenis_barang inner join tb_detail_gambar d on dp.id_barang=d.id_lain inner join tb_user u on dp.id_user=u.id_user where dp.id_user='$id_user' AND dp.id_pesanan='-' group by dp.id_transaksi order by dp.id_transaksi desc limit 1")or die(mysqli_error($koneksi));
                  while ($r=mysqli_fetch_array($data)){       
                ?>
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Detail Profil Kamu</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                 
                   <input type="hidden" name="id_pesanan" value="<?php echo $auto4; ?>" readonly="" id="input-payment-firstname" class="form-control">
                  <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" readonly="" id="input-payment-firstname" class="form-control">
                  <input type="hidden" name="status_bayar" value="1" readonly="" id="input-payment-firstname" class="form-control">
                  <input type="hidden" name="tgl_pesanan" value="<?php echo $sekarang; ?>" readonly="" id="input-payment-firstname" class="form-control">
                        
                  <div class="form-group">
                    <label class="col-lg-9">Nama Kamu</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Nama Pelanggan" type="text" value="<?php echo $r['nama_user']; ?>" name="nama_user" required="" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Email Kamu</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" value="<?php echo $r['email_user']; ?>" name="email_user" required="" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-9">Telp Kamu</label>
                      <div class="col-lg-6">
                        <input class="form-control form-control-user" placeholder="Masukkan Email Pelanggan" type="text" value="<?php echo $r['telp_user']; ?>" name="telp_user" required="" readonly="">
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Details Toko</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample1">
              <div class="card-body">
                        
                  <div class="form-group">
                    <label class="col-lg-9">Pilih Toko</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_toko" id="toko" onchange="show_selected()">
                          <option value=""> --- Pilih Toko --- </option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query1 = mysqli_query($koneksi,"SELECT * FROM tb_toko t inner join tb_user u on t.id_user=u.id_user where t.id_user='$id_user'");
                                  while ($data1=mysqli_fetch_array($query1)){
                                  ?>
                                  <option value="<?php echo $data1['id_toko']; ?>" id="<?php echo $data1['id_toko']; ?>"><?php echo $data1['nama_toko']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>       
                  <?php
                    include "../../koneksi/koneksi.php";
                    $toko =$_GET['toko'];
                    $query2 = mysqli_query($koneksi,"SELECT * FROM tb_toko t inner join tb_user u on t.id_user=u.id_user where t.id_user='$id_user' AND t.id_toko='$toko'");
                    while ($data2=mysqli_fetch_array($query2)){
                    ?>
                     <input type="hidden" name="id_toko" min="0" value="<?php echo $_GET['toko']; ?>" class="form-control" readonly>
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
                  <?php 
                  $jarak = $data2['jarak_toko']*1000;
                } ?>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
            <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran</h6>
            </a>
                <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample3">
              <div class="card-body">
                        
                  <div class="form-group">
                    <label class="col-lg-9">Pilih Metode Pembayaran</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="id_metode" id="pembayaran" required onchange="show_selected2()">
                          <option value=""> --- Pilih Metode Pembayaran --- </option>
                              <?php
                                include "../../koneksi/koneksi.php";
                                $query1 = mysqli_query($koneksi,"SELECT * FROM tb_metode_pembayaran");
                                  while ($data1=mysqli_fetch_array($query1)){
                                  ?>
                                  <option value="<?php echo $data1['id_metode']; ?>" id="<?php echo $data1['cashback']; ?>"><?php echo $data1['nama_metode']; ?> - <?php echo $data1['cashback']; ?></option>
                                  <?php
                                  }
                                ?>
                            </select>
                      </div>
                  </div>
                  
                  <div class="card-body">
                    <label class="col-lg-9">Barang yang dibeli</label>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Stok</th>
                      <th>Harga Satuan</th>
                      <th>Total</th>
                      <th>QTY</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    function rupiah($angka){
                        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                        return $hasil_rupiah;
                    }
                    include "../../koneksi/koneksi.php";
                    $no = 1;
                    $sql3 = mysqli_query($koneksi,"SELECT * from tb_barang b inner join tb_jenis_barang j on b.id_jenis_barang=j.id_jenis_barang inner join tb_detail_gambar d on b.id_barang=d.id_lain inner join tb_detail_pesanan dp on b.id_barang=dp.id_barang where dp.id_user='$id_user' AND dp.id_pesanan='-' group by b.id_barang order by b.id_barang desc");
                      while ($data3 = mysqli_fetch_array($sql3)){
                    ?>
                    <tr>
                      <td><img src="../assets/all/image/<?php echo $data3['file_gambar']; ?>" width="100wpx"></td>
                      <td><?php echo $data3['nama_barang']; ?>, 
                        <br><div style="font-size: 12px">Jenis : <?php echo $data3['nama_jenis_barang']; ?></div>
                        <div style="font-size: 12px">Berat : <?php echo $data3['berat_barang']; ?> kg</div>
                        <div style="font-size: 12px">Lebar : <?php echo $data3['lebar_barang']; ?> M</div>
                        <div style="font-size: 12px">Tinggi : <?php echo $data3['tinggi_barang']; ?> M</div>
                      </td>
                      <td><?php echo $data3['stok_barang']; ?></td>
                      <td><?php echo rupiah($data3["sub_total"]); ?></td>
                      <td><?php echo rupiah($data3["detail_total_harga"]); ?></td>
                        <td><input type="number" name="kuantitas" class="form-control form-control-sm" min="1" max="<?php echo $data3['stok_barang']; ?>"  value="<?php echo $data3['kuantitas_detail']; ?>"></td>                        
                    </tr>
                    <?php 

                    $qty = $qty+$data3['kuantitas_detail'];
                    $subtotal = $subtotal+$data3['detail_total_harga'];
                    $satuanberat =  $data3["berat_barang"];
                    $total_berat = $total_berat+$satuanberat*($data3['kuantitas_detail']);
                    $qty2 = $data3['kuantitas_detail'];
                    $ttlharga =  ($qty2 * $satuanberat)*2000;
                    $ttlharber =  ($ttlharber + $ttlharga);
                  } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="4"></th>
                      <th>Total Qty :</th>
                      <th><?php echo $qty; ?></th>
                      <input type="hidden" name="total_kuantitas" min="0" value="<?php echo $qty; ?>" class="form-control" readonly>
                      <input type="hidden" name="total_berat" min="0" value="<?php echo $total_berat; ?>" class="form-control" readonly>
                    </tr>
                    <tr>
                      <th colspan="4"></th>
                      <th>Sub Total :</th>
                      <th><?php echo rupiah($subtotal); ?></th>
                      <input type="hidden" name="subtotal" min="0" value="<?php echo $subtotal; ?>" id="subtotal" class="form-control" readonly>
                    </tr>
                    <tr>
                      <th colspan="4"></th>
                      <th>Harga Berat (*2000) :</th>
                      <th><?php echo rupiah($ttlharber); ?></th>
                      <input type="hidden" name="harga_kg" min="0" value="<?php echo $ttlharber; ?>" id="ttlharber" class="form-control" readonly>
                    </tr>
                    <tr>
                      <th colspan="4"></th>
                      <th>Ongkir (*1000) :</th>
                      <th><?php echo rupiah($jarak); ?></th>
                      <input type="hidden" name="harga_km" min="0" value="<?php echo $jarak; ?>" id="ongkir" class="form-control" readonly>
                    </tr>
                    <tr>
                      <th colspan="4"></th>
                      <th>Cashback :</th>
                      <th id='total_cashback'></th>
                      <input type="hidden" name="total_cashback" min="0" class="form-control" readonly>
                    </tr>
                    <tr>
                      <th colspan="4"></th>
                      <th>Total Keseluruhan :</th>
                      <th id='total_keseluruhan'></th>
                      <input type="hidden" name="total_keseluruhan" min="0" class="form-control" readonly>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
              <div class="form-group">
                    <label class="col-lg-9">Deskripsi Pesanan</label>
                      <div class="col-lg-12">
                        <textarea class="form-control form-control-user" name="des_pesanan" placeholder="*Barangnya Awas Jatuh"></textarea>
                      </div>
                  </div><br>
                  <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Confirm Order</button>
                  </div>
              </div>
            </div>
          </div>
          <?php } ?>
          </form>
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
        window.location = "checkout.php?toko="+tk;

    }
    function show_selected2() {
        var e = document.getElementById("pembayaran");
        var total_cashback = e.options[e.selectedIndex].id;
        var hargaongkir = document.getElementById("ongkir").value;
        var subttl = document.getElementById("subtotal").value;
        var ttlharber = document.getElementById("ttlharber").value; 
        var total_keseluruhan = (parseFloat(subttl) + parseFloat(hargaongkir) + parseFloat(ttlharber)) - parseFloat(total_cashback) ;
        
        // Cetak hasil
        document.getElementById("total_cashback").innerHTML = total_cashback;
        document.getElementById("total_keseluruhan").innerHTML = total_keseluruhan;
        document.form.total_cashback.value=total_cashback;
        document.form.total_keseluruhan.value=total_keseluruhan;

    }
</script> 
</body>

</html>
