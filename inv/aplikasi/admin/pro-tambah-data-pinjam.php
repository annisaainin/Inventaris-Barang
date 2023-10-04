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
// $upload_tandaterima=$_POST['upload_tandaterima'];
$lokasi_file = $_FILES['file_tandaterima']['tmp_name'];
$tipe_file = $_FILES['file_tandaterima']['type'];
$nama_file = $_FILES['file_tandaterima']['name'];
$n = "tanda-terima-$kode_pinjam.pdf";
$direktori = "tanda terima/$n";

move_uploaded_file($lokasi_file,$direktori);
$query = mysqli_query($koneksi,"INSERT INTO pinjam(kode_pinjam, noseri, jumlah, tgl_pinjam, tgl_kembali, peminjam, keterangan, status_id, upload_tandaterima) VALUES('$kode_pinjam', '$noseri', '$jumlah', '$tgl_pinjam', '$tgl_kembali', '$peminjam', '$keterangan', '$status_id', '$n')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-pinjam-pakai.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-data-pinjam-pakai.php?kode_pinjam=<?php echo $kode_pinjam; ?>';
      	</script>
		<?php
		}
		?>