<?php
session_start();
include "../../koneksi/koneksi.php";
$id_pesanan = $_GET['id_pesanan'];
// $id_pesanan = $_GET['id_pesanan'];
//error_reporting(0);
$id_user = $_SESSION['id_user'];
$sql = mysqli_query($koneksi, "SELECT * from tb_user where id_user='$id_user'");
$qry = (mysqli_num_rows($sql));
if ($qry == 0) {
?>
	<script language="JavaScript">
		alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
		document.location = '../../index.php';
	</script>
<?php
}

if (empty($_SESSION)) {
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');
    document.location='../../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

	<title>The Logistic - Nota Pesanan</title>
	<meta charset="utf-8">
	<meta name="keywords" content="html template, furniture html template, interior html template, furniture & interior html template, best html template, best furniture template, best furniture theme, furniture theme, theme for furniture" />
	<meta name="description" content="Furnicom is an awesome premium HTML template for any kind of online store, especially for furniture, interior, decoration, design studio and more. Quickly & easily build your website just by some clicks." />
	<meta name="author" content="Smartaddons">
	<meta name="robots" content="index, follow" />
	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- Favicon
	============================================ -->
	<link rel="shortcut icon" type="image/png" href="ico/favicon-16x16.png" />
	<!-- Google web fonts
	============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster&amp;display=swap" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/vendor/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/fonts-googleapis.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Poppins', sans-serif;
		}
	</style>
</head>

<body class="commpn-here res layout-1" onload="window.print();">
	<?php
	function rupiah1($angka)
	{
		$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}
	include "../../koneksi/koneksi.php";

	date_default_timezone_set("Asia/Jakarta");
	$sekarang = date("Y-m-d G:i:s", strtotime("now"));
	// $id_nota = $_GET['nota'];
	$sql2 = mysqli_query($koneksi, "SELECT * from tb_pesanan inner join tb_toko on tb_pesanan.id_toko = tb_toko.id_toko inner join tb_user on tb_pesanan.id_user = tb_user.id_user inner join tb_metode_pembayaran on tb_pesanan.id_metode = tb_metode_pembayaran.id_metode where tb_pesanan.id_pesanan = '$id_pesanan'") or die(mysqli_error($koneksi));
	while ($data = mysqli_fetch_array($sql2)) {
	?>
		<!-- Main Container  -->
		<div class="main-container container">

			<div class="row table-responsive" align="center">
				<!--Middle Part Start-->
				<div id="content" class="col-md-9" style="padding-top:50px;">
					<div style="text-align: center;">
						<h2>The Logistics</h2>
						<img src="assets/img/logo.png" width="100px" height="100px">
					</div>
					<br>
					<div>
						<p>Di Cetak Pada <?php echo $sekarang = date("d-m-Y G:i", strtotime("now")); ?></p>
					</div>
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<td colspan="2" class="text-left">Order Details</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width: 50%;" class="text-left"> Nama :
									<br>
									Email:<br>
									Tanggal Order:<br>
									Metode Pembayaran:
								</td>
								<td style="width: 50%;" class="text-left"><?php echo $data['nama_toko']; ?>
									<br>
									<?php echo $data['email_user']; ?><br>
									<?php echo $data['tgl_pesanan']; ?><br>
									<?php echo $data['nama_metode']; ?>
								</td>

							</tr>
						</tbody>
					</table>
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<td style="width: 50%; vertical-align: top;" class="text-left">Alamat The Logistics</td>
								<td style="width: 50%; vertical-align: top;" class="text-left">Alamat Tujuan Pengiriman</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-left">Jl. Ketintang No.156, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231</td>
								<td class="text-left"><?php echo $data['jalan_toko']; ?>, RT <?php echo $data['rt_toko']; ?> RW <?php echo $data['rw_toko']; ?>, <?php echo $data['desa_toko']; ?>, <?php echo $data['kec_toko']; ?>, <?php echo $data['wil_toko']; ?>, <?php echo $data['prov_toko']; ?>, <?php echo $data['kode_pos']; ?></td>
							</tr>
						</tbody>
					</table>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<td class="text-left">Total Kuantitas</td>
									<td class="text-left">Berat</td>
									<td class="text-right">Harga Total</td>
									<td class="text-right">Ongkos Kirim</td>
									<td class="text-right">Cashback</td>
									<td class="text-right">Total Keseluruhan</td>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql4 = mysqli_query($koneksi, "SELECT * from tb_pesanan where tb_pesanan.id_pesanan = '$id_pesanan'") or die(mysqli_error($koneksi));
								while ($data = mysqli_fetch_array($sql4)) {
								?>
									<tr>
										<td class="text-left"><?php echo $data['total_kuantitas']; ?></td>
										<td class="text-left"><?php echo $data['total_berat']; ?> kg</td>
										<td class="text-right"><?php echo rupiah1($data['harga_kg']); ?></td>
										<td class="text-right"><?php echo rupiah1($data['harga_km']); ?></td>
										<td class="text-right"><?php echo rupiah1($data['total_cashback']); ?></td>
										<td class="text-right"><?php echo rupiah1($data['total_keseluruhan']); ?></td>

									</tr>
								<?php
								} ?>
							</tbody>
						</table>
					</div>
				</div>
				</center>
				<!--Middle Part End-->
				<!--Right Part Start -->
				<!--Right Part End -->
			</div>
		</div>
	<?php } ?>

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
</body>

</html>