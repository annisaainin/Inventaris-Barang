<?php
include '../../koneksi/koneksi.php';

$id_gudang = $_POST['id_gudang'];
$nama_gudang = $_POST['nama_gudang'];

$query = mysqli_query($koneksi, "UPDATE tb_gudang SET nama_gudang='$nama_gudang' where id_gudang='$id_gudang'");

if ($query == true) {
?>
	<script language="JavaScript">
		alert('Data berhasil Diedit');
		document.location = 'data-gudang.php';
	</script>

<?php
} else {
?>
	<script language="JavaScript">
		alert('Maaf, Terjadi Kesalahan!');
		document.location = 'form-edit-gudang.php?id_toko=<?php echo $id_gudang; ?>';
	</script>
<?php
}
?>