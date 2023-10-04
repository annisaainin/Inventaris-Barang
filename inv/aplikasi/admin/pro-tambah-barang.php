<?php
include '../../koneksi/koneksi.php';

$noseri=$_POST['noseri'];
//$gambar=$_FILES['gambar'];
$lokasi_file = $_FILES['file_gambar']['tmp_name'];
$tipe_file = $_FILES['file_gambar']['type'];
$nama_file = $_FILES['file_gambar']['name'];
$direktori = "images/$nama_file";
$tipe_barang=$_POST['tipe_barang'];
$nama_barang=$_POST['nama_barang'];
$id_jenis=$_POST['id_jenis'];
$jumlah=1;
$id_kondisi=$_POST['id_kondisi'];
$lokasi=$_POST['lokasi'];

move_uploaded_file($lokasi_file,$direktori);
$query = mysqli_query($koneksi,"INSERT INTO barang(noseri, gambar, tipe_barang, nama_barang, id_jenis, jumlah, id_kondisi, lokasi) VALUES('$noseri', '$nama_file', '$tipe_barang', '$nama_barang', '$id_jenis', '$jumlah', '$id_kondisi', '$lokasi')")or die(mysqli_error($koneksi));
if(($query)==1){ 
	?>
	<script language="JavaScript">
		alert('Data berhasil Ditambahkan');
		document.location='data-barang.php';
	  </script>
<?php
}else{
?>
<script language="JavaScript">
	alert('Terjadi Kesalahan Input!');
	document.location='form-tambah-barang.php?id_barang=<?php echo $noseri; ?>';
  </script>
<?php
}
?>