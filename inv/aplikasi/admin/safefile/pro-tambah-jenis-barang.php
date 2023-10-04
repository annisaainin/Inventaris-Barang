<?php
include '../../koneksi/koneksi.php';
$id_jenis_barang = $_POST['id_jenis_barang'];
$nama_jenis_barang = $_POST['nama_jenis_barang'];

$query = mysqli_query($koneksi, "INSERT INTO tb_jenis_barang(id_jenis_barang,nama_jenis_barang) VALUES('$id_jenis_barang','$nama_jenis_barang')") or die(mysqli_error($koneksi));

if (($query) == 1) {
?>
	<script language="JavaScript">
		alert('Data berhasil Ditambahkan');
		document.location = 'data-jenis-barang.php';
	</script>
<?php
} else {
?>
	<script language="JavaScript">
		alert('Terjadi Kesalahan Input!');
		document.location = 'form-tambah-jenis-barang.php?id_jenis_barang=<?php echo $id_jenis_barang; ?>';
	</script>
<?php
}
?>