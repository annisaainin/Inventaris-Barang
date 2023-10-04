<?php 
include '../../koneksi/koneksi.php';
$id_user =$_GET['id_user'];


$db=mysqli_query($koneksi,"DELETE FROM tb_user WHERE id_user='$id_user'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-pelanggan.php";
</script>

<?php } ?>