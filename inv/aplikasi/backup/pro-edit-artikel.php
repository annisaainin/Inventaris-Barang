<?php 
	include '../../koneksi/koneksi.php';

$id_artikel=$_POST['id_artikel'];
$judul_artikel=$_POST['judul_artikel'];
$isi_artikel=$_POST['isi_artikel'];
$tgl_artikel=$_POST['tgl_artikel'];
$id_user=$_POST['id_user'];

		
$query = mysqli_query($koneksi,"UPDATE tb_artikel SET judul_artikel='$judul_artikel',isi_artikel='$isi_artikel',tgl_artikel='$tgl_artikel',id_user='$id_user' where id_artikel='$id_artikel'");

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-artikel.php';
	      	</script>

			<?php
		}else{
			?>
		 <script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-artikel.php?id_artikel=<?php echo $id_artikel; ?>';
      	</script> 
		<?php
		}
?>