<?php 
	include '../../koneksi/koneksi.php';

$noseri=$_POST['noseri'];
$gambar=$_POST['gambar'];
$tipe_barang=$_POST['tipe_barang'];
$nama_barang=$_POST['nama_barang'];
$jenis_barang=$_POST['jenis_barang'];
$jumlah=$_POST['jumlah'];
$id_kondisi=$_POST['id_kondisi'];
$lokasi=$_POST['lokasi'];
//$lokasi=$_POST['lokasi'];
		
$query = mysqli_query($koneksi,"UPDATE barang SET id_kondisi='$id_kondisi' where noseri='$noseri'");

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-barang.php';
	      	</script>

			<?php
		}else{
			?>
		<script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-barang.php?noseri=<?php echo $noseri; ?>';
      	</script> 
		<?php
		}
?>