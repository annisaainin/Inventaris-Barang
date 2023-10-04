<?php 
	include '../../koneksi/koneksi.php';

$id_user=$_POST['id_user'];
$user_in=$_POST['user_in'];
$nip_user=$_POST['nip_user'];
$nama_user=$_POST['nama_user'];
$alamat_user=$_POST['alamat_user'];
$email_user=$_POST['email_user'];
$telp_user=$_POST['telp_user'];
$ttl_user=$_POST['ttl_user'];
$id_jenis_kelamin=$_POST['id_jenis_kelamin'];
$id_status=$_POST['id_status'];
$username_user=$_POST['username_user'];
$id_hak_akses=$_POST['id_hak_akses'];

		
$query = mysqli_query($koneksi,"UPDATE tb_user SET nip_user='$nip_user',nama_user='$nama_user',alamat_user='$alamat_user',email_user='$email_user',telp_user='$telp_user',ttl_user='$ttl_user',username_user='$username_user',id_jenis_kelamin='$id_jenis_kelamin',id_status='$id_status',id_hak_akses='$id_hak_akses',user_in='$user_in' where id_user='$id_user'");

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-user.php?hk=<?php echo $id_hak_akses; ?>';
	      	</script>

			<?php
		}else{
			?>
		 <script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-user.php?id_user=<?php echo $id_user; ?>';
      	</script> 
		<?php
		}
?>