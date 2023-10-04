<?php 
include '../../koneksi/koneksi.php';
$id_artikel=$_POST['id_artikel'];
$judul_artikel=$_POST['judul_artikel'];
$isi_artikel=$_POST['isi_artikel'];
$tgl_artikel=$_POST['tgl_artikel'];
$id_user=$_POST['id_user'];

$query = mysqli_query($koneksi,"INSERT INTO tb_artikel(id_artikel,judul_artikel,isi_artikel,tgl_artikel,id_user) VALUES('$id_artikel','$judul_artikel','$isi_artikel','$tgl_artikel','$id_user')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-artikel.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-artikel.php?id_artikel=<?php echo $id_artikel; ?>';
      	</script>
		<?php
		}
		?>