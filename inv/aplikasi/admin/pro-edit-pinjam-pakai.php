<?php 
	include '../../koneksi/koneksi.php';

$kode_pinjam=$_POST['kode_pinjam'];
$noseri=$_POST['noseri'];
$jumlah=$_POST['jumlah'];
$tgl_pinjam=$_POST['tgl_pinjam'];
$tgl_kembali=$_POST['tgl_kembali'];
$peminjam=$_POST['peminjam'];
$keterangan=$_POST['keterangan'];
$status_id=$_POST['status_id'];
$upload_tandaterima=$_POST['upload_tandaterima'];
		
$query = mysqli_query($koneksi,"UPDATE pinjam SET tgl_kembali='$tgl_kembali', status_id='$status_id' WHERE kode_pinjam='$kode_pinjam'");

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-pinjam-pakai.php';
	      	</script>

			<?php
		}else{
			?>
		<script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-pinjam-pakai.php?kode_pinjam=<?php echo $kode_pinjam; ?>';
      	</script> 
		<?php
		}
?>