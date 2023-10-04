<?php
include '../../koneksi/koneksi.php';
$id_gudang = $_GET['id_gudang'];


$db = mysqli_query($koneksi, "DELETE FROM tb_gudang WHERE id_gudang='$id_gudang'") or die(mysqli_error()); {
?>
	<script type="text/javascript">
		alert("Data Anda Berhasil Terhapus");
		window.location.href = "data-gudang.php";
	</script>

<?php } ?>