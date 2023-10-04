<?php 
include '../../koneksi/koneksi.php';
$id_ruangan =$_GET['id_ruangan'];

	

$db=mysqli_query($koneksi,"DELETE FROM tb_ruangan WHERE id_ruangan='$id_ruangan'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-ruangan.php";
</script>

<?php } ?>