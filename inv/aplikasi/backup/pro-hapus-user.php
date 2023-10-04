<?php 
include '../../koneksi/koneksi.php';
$id_user =$_GET['id_user'];
$hk =$_GET['hk'];

$query = "SELECT * FROM tb_detail_gambar WHERE id_lain='$id_user'";
	$sql = mysqli_query($koneksi, $query); 
	while ($data = mysqli_fetch_array($sql)) {
		if(is_file("../assets/all/image/".$data['file_gambar']));
		unlink("../assets/all/image/".$data['file_gambar']);
		$db=mysqli_query($koneksi,"DELETE FROM tb_detail_gambar WHERE id_lain='$id_user'") or die(mysqli_error());
	}
		
		
	

$db=mysqli_query($koneksi,"DELETE FROM tb_user WHERE id_user='$id_user'") or die(mysqli_error());
{
?> 
<script type="text/javascript">
	alert("Data Anda Berhasil Terhapus");
	window.location.href="data-user.php?hk=<?php echo $hk; ?>";
</script>

<?php } ?>