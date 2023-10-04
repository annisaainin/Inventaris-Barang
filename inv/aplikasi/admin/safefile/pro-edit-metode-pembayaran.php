<?php
include '../../koneksi/koneksi.php';

$id_metode = $_POST['id_metode'];
$nama_metode = $_POST['nama_metode'];
$cashback = $_POST['cashback'];

$query = mysqli_query($koneksi, "UPDATE tb_metode_pembayaran SET nama_metode='$nama_metode', cashback='$cashback' where id_metode='$id_metode'");

if ($query == true) {
?>
	<script language="JavaScript">
		alert('Data berhasil Diedit');
		document.location = 'data-metode-pembayaran.php';
	</script>

<?php
} else {
?>
	<script language="JavaScript">
		alert('Maaf, Terjadi Kesalahan!');
		document.location = 'form-edit-metode-pembayaran.php?id_toko=<?php echo $id_metode; ?>';
	</script>
<?php
}
?>