<?php
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
$jarak_toko = $_POST['jarak_toko'];
$gmaps = $_POST['gmaps'];

$query = mysqli_query($koneksi, "UPDATE tb_toko SET nama_toko='$nama_toko', telp_toko='$telp_toko', wa_toko='$wa_toko', rt_toko='$rt_toko', rw_toko='$rw_toko', jalan_toko='$jalan_toko', desa_toko='$desa_toko', kec_toko='$kec_toko', wil_toko='$wil_toko', prov_toko='$prov_toko', kode_pos='$kode_pos', des_toko='$des_toko', jarak_toko='$jarak_toko', gmaps='$gmaps' where id_toko='$id_toko'");

if ($query == true) {
?>
	<script language="JavaScript">
		alert('Data berhasil Diedit');
		document.location = 'data-toko.php';
	</script>

<?php
} else {
?>
	<script language="JavaScript">
		alert('Maaf, Terjadi Kesalahan!');
		document.location = 'form-edit-toko.php?id_toko=<?php echo $id_toko; ?>';
	</script>
<?php
}
?>