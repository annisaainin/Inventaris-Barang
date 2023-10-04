<?php
include '../../koneksi/koneksi.php';

$id_jenis_barang = $_POST['id_jenis_barang'];
$nama_jenis_barang = $_POST['nama_jenis_barang'];

$query = mysqli_query($koneksi, "UPDATE tb_jenis_barang SET nama_jenis_barang='$nama_jenis_barang' where id_jenis_barang='$id_jenis_barang'");

if ($query == true) {
?>
	<script language="JavaScript">
		alert('Data berhasil Diedit');
		document.location = 'data-jenis-barang.php';
	</script>

<?php
} else {
?>
	<script language="JavaScript">
		alert('Maaf, Terjadi Kesalahan!');
		document.location = 'form-edit-jenis-barang.php?id_toko=<?php echo $id_jenis_barang; ?>';
	</script>
<?php
}
?>