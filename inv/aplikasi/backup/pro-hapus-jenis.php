<?php 
include '../../koneksi/koneksi.php';
$id_jenis_barang =$_GET['id_jenis_barang'];

	

$db=mysqli_query($koneksi,"DELETE FROM tb_jenis_barang WHERE id_jenis_barang='$id_jenis_barang'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-jenis.php";
</script>

<?php } ?>