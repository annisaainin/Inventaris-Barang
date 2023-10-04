<?php 
include '../../koneksi/koneksi.php';
$id_metode =$_GET['id_metode'];

	

$db=mysqli_query($koneksi,"DELETE FROM tb_metode_pembayaran WHERE id_metode='$id_metode'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-metode.php";
</script>

<?php } ?>