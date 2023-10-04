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
$jenis_kelamin=$_POST['jenis_kelamin'];
//$id_hak_akses=$_POST['id_hak_akses'];


$query = mysqli_query($koneksi,"INSERT INTO tb_user(id_user,nip_user,nama_user,alamat_user,email_user,telp_user,ttl_user,username_user,password_user,jenis_kelamin,id_hak_akses) VALUES('$id_user','$nip_user','$nama_user','$alamat_user','$email_user','$telp_user','$ttl_user','$username_user','$password_user','$jenis_kelamin','HK00002')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-pelanggan.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-user-pelanggan.php?id_user=<?php echo $id_user; ?>';
      	</script>
		<?php
		}
		?>