<?php 
include '../../koneksi/koneksi.php';
$id_metode=$_POST['id_metode'];
$nama_metode=$_POST['nama_metode'];
$cashback=$_POST['cashback'];
$id_user=$_POST['id_user'];

$query = mysqli_query($koneksi,"INSERT INTO tb_metode_pembayaran(id_metode,nama_metode,cashback,id_user) VALUES('$id_metode','$nama_metode','$cashback','$id_user')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-metode.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-metode.php';
      	</script>
		<?php
		}
		?>