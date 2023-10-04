<?php
include '../../koneksi/koneksi.php';
$id_jenis = $_GET['id_jenis'];


$db = mysqli_query($koneksi, "DELETE FROM jenis_barang WHERE id_jenis='$id_jenis'") or die(mysqli_error()); {
	
?>
	<script type="text/javascript">
		alert("Data Anda Berhasil Terhapus");
		window.location.href = "data-jenis-barang.php";
	</script>

<?php } ?>