<?php 
include '../../koneksi/koneksi.php';
$kode_keluar=$_POST['kode_keluar'];
$noseri=$_POST['noseri'];
$tgl_keluar=$_POST['tgl_keluar'];
$penerima=$_POST['penerima'];
$jumlah=$_POST['jumlah'];
$suratkeluar=$_POST['suratkeluar'];
$keterangan=$_POST['keterangan'];

$query = mysqli_query($koneksi,"INSERT INTO keluar(kode_keluar, noseri, tgl_keluar, penerima, jumlah, suratkeluar, keterangan) VALUES('$kode_keluar', '$noseri', '$tgl_keluar', '$penerima', '$jumlah', '$suratkeluar', '$keterangan')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-keluar.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-data-keluar.php?kode_keluar=<?php echo $kode_keluar; ?>';
      	</script>
		<?php
		}
		?>