<?php 
include '../../koneksi/koneksi.php';
$id_jenis_barang=$_POST['id_jenis_barang'];
$nama_jenis_barang=$_POST['nama_jenis_barang'];
$id_user=$_POST['id_user'];

$query = mysqli_query($koneksi,"INSERT INTO tb_jenis_barang(id_jenis_barang,nama_jenis_barang,id_user) VALUES('$id_jenis_barang','$nama_jenis_barang','$id_user')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-jenis.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-jenis.php';
      	</script>
		<?php
		}
		?>