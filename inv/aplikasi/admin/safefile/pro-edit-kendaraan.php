<?php 
	include '../../koneksi/koneksi.php';

$id_kendaraan=$_POST['id_kendaraan'];
$no_pol=$_POST['no_pol'];
$nama_kendaraan=$_POST['nama_kendaraan'];
$tipe_kendaraan=$_POST['tipe_kendaraan'];
$merk_kendaraan=$_POST['merk_kendaraan'];
$tahun_kendaraan=$_POST['tahun_kendaraan'];
$batas_berat=$_POST['batas_berat'];
$panjang_kendaraan=$_POST['panjang_kendaraan'];
$lebar_kendaraan=$_POST['lebar_kendaraan'];
$tinggi_kendaraan=$_POST['tinggi_kendaraan'];
		
$query = mysqli_query($koneksi,"UPDATE tb_kendaraan SET no_pol='$no_pol',nama_kendaraan='$nama_kendaraan',tipe_kendaraan='$tipe_kendaraan',merk_kendaraan='$merk_kendaraan',tahun_kendaraan='$tahun_kendaraan',batas_berat='$batas_berat',panjang_kendaraan='$panjang_kendaraan',lebar_kendaraan='$lebar_kendaraan',tinggi_kendaraan='$tinggi_kendaraan' where id_kendaraan='$id_kendaraan'");

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-kendaraan.php';
	      	</script>

			<?php
		}else{
			?>
		<script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-kendaraan.php?id_kendaraan=<?php echo $id_kendaraan; ?>';
      	</script> 
		<?php
		}
?>