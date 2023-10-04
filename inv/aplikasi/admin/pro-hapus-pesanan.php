<?php 
include '../../koneksi/koneksi.php';
$id_toko =$_GET['id_toko'];


$db=mysqli_query($koneksi,"DELETE FROM tb_toko WHERE id_toko='$id_toko'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-toko.php";
</script>

<?php } ?>