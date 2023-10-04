<?php 
include '../../koneksi/koneksi.php';
$id_barang =$_GET['id_barang'];

$query = "SELECT * FROM tb_detail_gambar WHERE id_lain='$id_barang'";
	$sql = mysqli_query($koneksi, $query); 
	while ($data = mysqli_fetch_array($sql)) {
		if(is_file("../assets/all/image/".$data['file_gambar']));
		unlink("../assets/all/image/".$data['file_gambar']);
		$db=mysqli_query($koneksi,"DELETE FROM tb_detail_gambar WHERE id_lain='$id_barang'") or die(mysqli_error());
	}
		
		
	

$db=mysqli_query($koneksi,"DELETE FROM tb_barang WHERE id_barang='$id_barang'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-barang.php";
</script>

<?php } ?>