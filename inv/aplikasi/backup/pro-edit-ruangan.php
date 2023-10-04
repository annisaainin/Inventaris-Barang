<?php 
	include '../../koneksi/koneksi.php';

$id_ruangan=$_POST['id_ruangan'];
$nama_ruangan=$_POST['nama_ruangan'];
$id_user=$_POST['id_user'];

		
$query = mysqli_query($koneksi,"UPDATE tb_ruangan SET nama_ruangan='$nama_ruangan',id_user='$id_user' where id_ruangan='$id_ruangan'")or die(mysqli_error($koneksi));

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-ruangan.php';
	      	</script>

			<?php
		}else{
			?>
		 <script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-ruangan.php?id_ruangan=<?php echo $id_ruangan; ?>';
      	</script> 
		<?php
		}
?>