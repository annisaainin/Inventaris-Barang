<?php 
include '../../koneksi/koneksi.php';
$id_jenis_barang=$_POST['id_jenis_barang'];
$nama_jenis_barang=$_POST['nama_jenis_barang'];
$id_user=$_POST['id_user'];

		
$query = mysqli_query($koneksi,"UPDATE tb_jenis_barang SET nama_jenis_barang='$nama_jenis_barang',id_user='$id_user' where id_jenis_barang='$id_jenis_barang'")or die(mysqli_error($koneksi));

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-jenis.php';
	      	</script>

			<?php
		}else{
			?>
		 <script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-jenis.php?id_jenis_barang=<?php echo $id_jenis_barang; ?>';
      	</script> 
		<?php
		}
?>