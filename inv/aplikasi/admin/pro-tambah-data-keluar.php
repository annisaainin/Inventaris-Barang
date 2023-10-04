<?php 
include '../../koneksi/koneksi.php';
$kode_keluar=$_POST['kode_keluar'];
$noseri=$_POST['noseri'];
//$gambar=$_POST['gambar'];
$tipe_barang=$_POST['tipe_barang'];
$nama_barang=$_POST['nama_barang'];
$id_jenis=$_POST['id_jenis'];
$jumlah=1;
$id_kondisi=$_POST['id_kondisi'];
$lokasi=$_POST['lokasi'];
$tgl_keluar=$_POST['tgl_keluar'];
$penerima=$_POST['penerima'];
//$suratmasuk=$_POST['suratmasuk'];
$keterangan=$_POST['keterangan'];

//gambar keluar
$lokasi_gambar = $_FILES['file_gambar']['tmp_name'];
$tipe_gambar = $_FILES['file_gambar']['type'];
$nama_gambar = $_FILES['file_gambar']['name'];
$direktori_gambar = "images keluar/$nama_gambar";

//surat keluar
$lokasi_file = $_FILES['file_keluar']['tmp_name'];
$tipe_file = $_FILES['file_keluar']['type'];
$nama_file = $_FILES['file_keluar']['name'];
$n = "surat-keluar-$kode_keluar.pdf";
$direktori = "surat keluar/$n";

//tabel barang
//$kode_barang=$_POST['kode_barang'];

move_uploaded_file($lokasi_gambar, $direktori_gambar);
move_uploaded_file($lokasi_file,$direktori);
$query = mysqli_query($koneksi,"INSERT INTO keluar(kode_keluar, noseri, gambar, tipe_barang, nama_barang, id_jenis, jumlah, id_kondisi, lokasi, tgl_keluar, penerima, suratkeluar, keterangan) VALUES('$kode_keluar', '$noseri', '$nama_gambar', '$tipe_barang', '$nama_barang', '$id_jenis', '$jumlah', '$id_kondisi', '$lokasi', '$tgl_keluar', '$penerima', '$n', '$keterangan')")or die(mysqli_error($koneksi));
$query = mysqli_query($koneksi, "DELETE FROM barang WHERE noseri='$noseri'");
//$query = mysqli_query($koneksi,"INSERT INTO barang(noseri, gambar, tipe_barang, nama_barang, id_jenis, jumlah, id_kondisi, lokasi) VALUES('$noseri', '$nama_file', '$tipe_barang', '$nama_barang', '$id_jenis', '$jumlah', '$id_kondisi', '$lokasi')")or die(mysqli_error($koneksi));
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