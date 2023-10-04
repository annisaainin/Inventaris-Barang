<?php 
include '../../koneksi/koneksi.php';
$id_kendaraan =$_GET['id_kendaraan'];


$db=mysqli_query($koneksi,"DELETE FROM tb_kendaraan WHERE id_kendaraan='$id_kendaraan'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-kendaraan.php";
</script>

<?php } ?>