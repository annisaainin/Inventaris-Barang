<?php 
include '../../koneksi/koneksi.php';
$kode_perawatan=$_POST['kode_perawatan'];
$noseri=$_POST['noseri'];
$jumlah=$_POST['jumlah'];
$tgl_perawatan=$_POST['tgl_perawatan'];
$id_kondisi=$_POST['id_kondisi'];
$id_status=$_POST['id_status'];
$keterangan=$_POST['keterangan'];


$query = mysqli_query($koneksi,"INSERT INTO perawatan(kode_perawatan, noseri, jumlah, tgl_perawatan, id_kondisi, id_status, keterangan) VALUES('$kode_perawatan', '$noseri', '$jumlah', '$tgl_perawatan', '$id_kondisi', '$id_status', '$keterangan')")or die(mysqli_error($koneksi));
$query = mysqli_query($koneksi,"UPDATE barang SET id_kondisi='$id_kondisi' WHERE noseri='$noseri'");
		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-perawatan.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-perawatan.php?kode_perawatan=<?php echo $kode_perawatan; ?>';
      	</script>
		<?php
		}
		?>