<?php
include '../../koneksi/koneksi.php';

$id_jenis=$_POST['id_jenis'];
$jenis_barang=$_POST['jenis_barang'];

$query = mysqli_query($koneksi,"INSERT INTO jenis_barang(id_jenis, jenis_barang) VALUES('$id_jenis', '$jenis_barang')")or die(mysqli_error($koneksi));
if(($query)==1){ 
	?>
	<script language="JavaScript">
		alert('Data berhasil Ditambahkan');
		document.location='data-jenis-barang.php';
	  </script>
<?php
}else{
?>
<script language="JavaScript">
	alert('Terjadi Kesalahan Input!');
	document.location='form-tambah-jenis.php?id_jenis=<?php echo $id_jenis; ?>';
  </script>
<?php
}
?>