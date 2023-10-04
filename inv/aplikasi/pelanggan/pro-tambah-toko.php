<?php
session_start();
include '../../koneksi/koneksi.php';
$id_toko = $_POST['id_toko'];
$nama_toko = $_POST['nama_toko'];
$telp_toko = $_POST['telp_toko'];
$wa_toko = $_POST['wa_toko'];
$rt_toko = $_POST['rt_toko'];
$rw_toko = $_POST['rw_toko'];
$jalan_toko = $_POST['jalan_toko'];
$desa_toko = $_POST['desa_toko'];
$kec_toko = $_POST['kec_toko'];
$wil_toko = $_POST['wil_toko'];
$prov_toko = $_POST['prov_toko'];
$kode_pos = $_POST['kode_pos'];
$des_toko = $_POST['des_toko'];
// $jarak_toko = $_POST['jarak_toko'];
$gmaps = $_POST['gmaps'];
$id_user = $_SESSION['id_user'];

$query = mysqli_query($koneksi, "INSERT INTO tb_toko(id_toko, nama_toko, telp_toko, wa_toko, rt_toko, rw_toko, jalan_toko, desa_toko, kec_toko, wil_toko, prov_toko, kode_pos, des_toko, jarak_toko, gmaps, id_user) VALUES('$id_toko','$nama_toko','$telp_toko','$wa_toko','$rt_toko','$rw_toko', '$jalan_toko', '$desa_toko','$kec_toko','$wil_toko','$prov_toko', '$kode_pos', '$des_toko', '-', '$gmaps', '$id_user')") or die(mysqli_error($koneksi));

if (($query) == 1) {
?>
	<script language="JavaScript">
		alert('Data berhasil Ditambahkan');
		document.location = 'data-toko.php';
	</script>
<?php
} else {
?>
	<script language="JavaScript">
		alert('Terjadi Kesalahan Input!');
		document.location = 'form-tambah-toko.php?id_toko=<?php echo $id_toko; ?>';
	</script>
<?php
}
?>