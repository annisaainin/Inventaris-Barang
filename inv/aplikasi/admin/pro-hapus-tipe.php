<?php
include '../../koneksi/koneksi.php';
$id_tipe = $_GET['id_tipe'];


$db = mysqli_query($koneksi, "DELETE FROM tipe_barang WHERE id_tipe='$id_tipe'") or die(mysqli_error()); {
	
?>
	<script type="text/javascript">
		alert("Data Anda Berhasil Terhapus");
		window.location.href = "data-tipe-barang.php";
	</script>

<?php } ?>