<?php
include '../../koneksi/koneksi.php';

$id_tipe=$_POST['id_tipe'];
$tipe_barang=$_POST['tipe_barang'];

$query = mysqli_query($koneksi,"INSERT INTO tipe_barang(id_tipe, tipe_barang) VALUES('$id_tipe', '$tipe_barang')")or die(mysqli_error($koneksi));
if(($query)==1){ 
	?>
	<script language="JavaScript">
		alert('Data berhasil Ditambahkan');
		document.location='data-tipe-barang.php';
	  </script>
<?php
}else{
?>
<script language="JavaScript">
	alert('Terjadi Kesalahan Input!');
	document.location='form-tambah-tipe.php?id_tipe=<?php echo $id_tipe; ?>';
  </script>
<?php
}
?>