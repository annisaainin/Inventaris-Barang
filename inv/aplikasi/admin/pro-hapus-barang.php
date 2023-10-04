<?php
include '../../koneksi/koneksi.php';
$noseri = $_GET['noseri'];


//$db = mysqli_query($koneksi, "DELETE FROM pinjam WHERE noseri='$noseri'") or die(mysqli_error());
$db = mysqli_query($koneksi, "DELETE FROM barang WHERE noseri='$noseri'");
//$db1 = mysqli_query($koneksi, "DELETE FROM pinjam WHERE noseri='$noseri' and status_id='STP001'");

if(($db)==1){ 
	?>
	<script type="text/javascript">
		alert('Data berhasil dihapus');
		document.location='data-barang.php';
	  </script>
<?php
}else{
?>
<script type="text/javascript">
	alert('Barang Dalam Proses Lainnya');
	document.location='data-barang.php';
  </script>
<?php
}
?>