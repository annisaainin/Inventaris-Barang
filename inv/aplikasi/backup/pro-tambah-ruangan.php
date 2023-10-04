<?php 
include '../../koneksi/koneksi.php';
$id_ruangan=$_POST['id_ruangan'];
$nama_ruangan=$_POST['nama_ruangan'];
$id_user=$_POST['id_user'];

$query = mysqli_query($koneksi,"INSERT INTO tb_ruangan(id_ruangan,nama_ruangan,id_user) VALUES('$id_ruangan','$nama_ruangan','$id_user')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-ruangan.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-ruangan.php';
      	</script>
		<?php
		}
		?>