<?php 
include '../../koneksi/koneksi.php';
$id_kendaraan=$_POST['id_kendaraan'];
$no_pol=$_POST['no_pol'];
$nama_kendaraan=$_POST['nama_kendaraan'];
$tipe_kendaraan=$_POST['tipe_kendaraan'];
$merk_kendaraan=$_POST['merk_kendaraan'];
$tahun_kendaraan=$_POST['tahun_kendaraan'];
$batas_berat=$_POST['batas_berat'];
$panjang_kendaraan=$_POST['panjang_kendaraan'];
$lebar_kendaraan=$_POST['lebar_kendaraan'];
$tinggi_kendaraan=$_POST['tinggi_kendaraan'];

$query = mysqli_query($koneksi,"INSERT INTO tb_kendaraan(id_kendaraan,no_pol,nama_kendaraan,tipe_kendaraan,merk_kendaraan,tahun_kendaraan,batas_berat,panjang_kendaraan,lebar_kendaraan,tinggi_kendaraan,batas_sementara,jarak_sementara,status_kendaraan) VALUES('$id_kendaraan','$no_pol','$nama_kendaraan','$tipe_kendaraan','$merk_kendaraan','$tahun_kendaraan','$batas_berat','$panjang_kendaraan','$lebar_kendaraan','$tinggi_kendaraan','0','0','0')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-kendaraan.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-kendaraan.php?id_toko=<?php echo $id_kendaraan; ?>';
      	</script>
		<?php
		}
		?>