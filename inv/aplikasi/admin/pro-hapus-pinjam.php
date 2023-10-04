<?php
include '../../koneksi/koneksi.php';
$kode_pinjam = $_GET['kode_pinjam'];


$db = mysqli_query($koneksi, "DELETE FROM pinjam WHERE kode_pinjam='$kode_pinjam'") or die(mysqli_error()); {
	
?>
	<script type="text/javascript">
		alert("Data Anda Berhasil Terhapus");
		window.location.href = "data-pinjam-pakai.php";
	</script>

<?php } ?>