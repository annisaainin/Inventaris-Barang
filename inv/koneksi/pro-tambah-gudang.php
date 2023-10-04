<?php
include '../../koneksi/koneksi.php';
$id_gudang = $_POST['id_gudang'];
$nama_gudang = $_POST['nama_gudang'];

$query = mysqli_query($koneksi, "INSERT INTO tb_gudang(id_gudang,nama_gudang) VALUES('$id_gudang','$nama_gudang')") or die(mysqli_error($koneksi));

if (($query) == 1) {
?>
	<script language="JavaScript">
		alert('Data berhasil Ditambahkan');
		document.location = 'data-gudang.php';
	</script>
<?php
} else {
?>
	<script language="JavaScript">
		alert('Terjadi Kesalahan Input!');
		document.location = 'form-tambah-gudang.php?id_gudang=<?php echo $id_gudang; ?>';
	</script>
<?php
}
?>