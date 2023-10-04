<?php
include '../../koneksi/koneksi.php';

$id_pengiriman = $_POST['id_pengiriman'];
$tgl_pengiriman = $_POST['tgl_pengiriman'];
$id_kendaraan = $_POST['id_kendaraan'];

$query = mysqli_query($koneksi, "UPDATE tb_pengiriman SET tgl_pengiriman='$tgl_pengiriman' where id_pengiriman='$id_pengiriman'");
$query6 = mysqli_query($koneksi,"UPDATE tb_kendaraan SET status_kendaraan='1' where id_kendaraan='$id_kendaraan'")or die(mysqli_error($koneksi));

if ($query == true) {
?>
	<script language="JavaScript">
		alert('Data berhasil Dijadwalkan');
		document.location = 'data-pengiriman.php';
	</script>

<?php
} else {
?>
	<script language="JavaScript">
		alert('Maaf, Terjadi Kesalahan!');
		document.location = 'data-pengiriman.php';
	</script>
<?php
}
?>