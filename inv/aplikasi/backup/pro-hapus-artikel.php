<?php 
include '../../koneksi/koneksi.php';
$id_artikel =$_GET['id_artikel'];

$query = "SELECT * FROM tb_detail_gambar WHERE id_lain='$id_artikel'";
	$sql = mysqli_query($koneksi, $query); 
	while ($data = mysqli_fetch_array($sql)) {
		if(is_file("../assets/all/image/".$data['file_gambar']));
		unlink("../assets/all/image/".$data['file_gambar']);
		$db=mysqli_query($koneksi,"DELETE FROM tb_detail_gambar WHERE id_lain='$id_artikel'") or die(mysqli_error());
	}
		
		
	

$db=mysqli_query($koneksi,"DELETE FROM tb_artikel WHERE id_artikel='$id_artikel'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-artikel.php";
</script>

<?php } ?>