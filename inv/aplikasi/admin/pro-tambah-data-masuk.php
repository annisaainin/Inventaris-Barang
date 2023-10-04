<?php 
include '../../koneksi/koneksi.php';
$kode_masuk=$_POST['kode_masuk'];
$noseri=$_POST['noseri'];
//$gambar=$_POST['gambar'];
$tipe_barang=$_POST['tipe_barang'];
$nama_barang=$_POST['nama_barang'];
$id_jenis=$_POST['id_jenis'];
$jumlah=1;
$id_kondisi=$_POST['id_kondisi'];
$lokasi=$_POST['lokasi'];
$tgl_masuk=$_POST['tgl_masuk'];
$pengirim=$_POST['pengirim'];
//$suratmasuk=$_POST['suratmasuk'];
$keterangan=$_POST['keterangan'];

//gambar masuk
$lokasi_gambar = $_FILES['file_gambar']['tmp_name'];
$tipe_gambar = $_FILES['file_gambar']['type'];
$nama_gambar = $_FILES['file_gambar']['name'];
$direktori_gambar = "images masuk/$nama_gambar";

//gambar barang
$lokasi_gambar_barang = $_FILES['file_gambar']['tmp_name'];
$tipe_gambar_barang = $_FILES['file_gambar']['type'];
$nama_gambar_barang = $_FILES['file_gambar']['name'];
$direktori_gambar_barang = "images /$nama_gambar";

//surat masuk
$lokasi_file = $_FILES['file_masuk']['tmp_name'];
$tipe_file = $_FILES['file_masuk']['type'];
$nama_file = $_FILES['file_masuk']['name'];
$n = "surat-masuk-$kode_masuk.pdf";
$direktori = "surat masuk/$n";

//tabel barang
//$kode_barang=$_POST['kode_barang'];

move_uploaded_file($lokasi_gambar, $direktori_gambar);
move_uploaded_file($lokasi_file,$direktori);
move_uploaded_file($lokasi_gambar_barang,$direktori_gambar_barang);
$query = mysqli_query($koneksi,"INSERT INTO masuk(kode_masuk, noseri, gambar, tipe_barang, nama_barang, id_jenis, jumlah, id_kondisi, lokasi, tgl_masuk, pengirim, suratmasuk, keterangan) VALUES('$kode_masuk', '$noseri', '$nama_gambar', '$tipe_barang', '$nama_barang', '$id_jenis', '$jumlah', '$id_kondisi', '$lokasi', '$tgl_masuk', '$pengirim', '$n', '$keterangan')")or die(mysqli_error($koneksi));
$query = mysqli_query($koneksi,"INSERT INTO barang(noseri, gambar, tipe_barang, nama_barang, id_jenis, jumlah, id_kondisi, lokasi) VALUES('$noseri', '$nama_gambar_barang', '$tipe_barang', '$nama_barang', '$id_jenis', '$jumlah', '$id_kondisi', '$lokasi')")or die(mysqli_error($koneksi));
		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-masuk.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-data-masuk.php?kode_masuk=<?php echo $kode_masuk; ?>';
      	</script>
		<?php
		}
		?>