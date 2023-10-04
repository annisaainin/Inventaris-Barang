<?php 
	include '../../koneksi/koneksi.php';

$kode_perawatan=$_POST['kode_perawatan'];
$noseri=$_POST['noseri'];
$jumlah=$_POST['jumlah'];
$tgl_perawatan=$_POST['tgl_perawatan'];
$tgl_selesai=$_POST['tgl_selesai'];
$id_kondisi=$_POST['id_kondisi'];
$id_status=$_POST['id_status'];
$keterangan=$_POST['keterangan'];
		
$query = mysqli_query($koneksi,"UPDATE perawatan SET tgl_selesai='$tgl_selesai', id_kondisi='$id_kondisi', id_status='$id_status', keterangan='$keterangan' WHERE kode_perawatan='$kode_perawatan'");
$query = mysqli_query($koneksi,"UPDATE barang SET id_kondisi='$id_kondisi' WHERE noseri='$noseri'");
		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-perawatan.php';
	      	</script>

			<?php
		}else{
			?>
		<script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-data-perawatan.php?kode_perawatan=<?php echo $kode_perawatan; ?>';
      	</script> 
		<?php
		}
?>