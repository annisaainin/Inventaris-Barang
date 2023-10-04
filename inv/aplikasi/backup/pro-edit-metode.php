<?php 
	include '../../koneksi/koneksi.php';

$id_metode=$_POST['id_metode'];
$nama_metode=$_POST['nama_metode'];
$cashback=$_POST['cashback'];
$id_user=$_POST['id_user'];

		
$query = mysqli_query($koneksi,"UPDATE tb_metode_pembayaran SET nama_metode='$nama_metode',cashback='$cashback',id_user='$id_user' where id_metode='$id_metode'")or die(mysqli_error($koneksi));

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-metode.php';
	      	</script>

			<?php
		}else{
			?>
		 <script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-metode.php';
      	</script> 
		<?php
		}
?>