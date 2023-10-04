<?php 
	include '../../koneksi/koneksi.php';

$id_user=$_POST['id_user'];
$nip_user=$_POST['nip_user'];
$nama_user=$_POST['nama_user'];
$alamat_user=$_POST['alamat_user'];
$email_user=$_POST['email_user'];
$telp_user=$_POST['telp_user'];
$ttl_user=$_POST['ttl_user'];
$username_user=$_POST['username_user'];
$password_user=$_POST['password_user'];
//$jenis_kelamin=$_POST['jenis_kelamin'];
		
$query = mysqli_query($koneksi,"UPDATE tb_user SET nip_user='$nip_user',nama_user='$nama_user',alamat_user='$alamat_user',email_user='$email_user',telp_user='$telp_user',ttl_user='$ttl_user',username_user='$username_user',password_user='$password_user' where id_user='$id_user'");

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-admin.php';
	      	</script>

			<?php
		}else{
			?>
		<script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-user-admin.php?id_user=<?php echo $id_user; ?>';
      	</script> 
		<?php
		}
?>