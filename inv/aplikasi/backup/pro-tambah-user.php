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
$password_user=md5($_POST['password_user']);
$id_hak_akses=$_POST['id_hak_akses'];

$query = mysqli_query($koneksi,"INSERT INTO tb_user(id_user,nip_user,nama_user,alamat_user,email_user,telp_user,ttl_user,username_user,password_user,id_jenis_kelamin,id_status,id_hak_akses,user_in) VALUES('$id_user','$nip_user','$nama_user','$alamat_user','$email_user','$telp_user','$ttl_user','$username_user','$password_user','$id_jenis_kelamin','$id_status','$id_hak_akses','$user_in')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-user.php?hk=<?php echo $id_hak_akses; ?>';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-user.php?id_user=<?php echo $id_user; ?>';
      	</script>
		<?php
		}
		?>