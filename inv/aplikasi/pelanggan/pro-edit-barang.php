<?php 
	include '../../koneksi/koneksi.php';

$id_barang=$_POST['id_barang'];
$nama_barang=$_POST['nama_barang'];
$lebar_barang=$_POST['lebar_barang'];
$tinggi_barang=$_POST['tinggi_barang'];
$berat_barang=$_POST['berat_barang'];
$stok_barang=$_POST['stok_barang'];
$harga_barang=$_POST['harga_barang'];
$tgl_produksi=$_POST['tgl_produksi'];
$gudang_barang=$_POST['gudang_barang'];
$jenis_barang=$_POST['jenis_barang'];
		
$query = mysqli_query($koneksi,"UPDATE tb_barang SET nama_barang='$nama_barang',berat_barang='$berat_barang',lebar_barang='$lebar_barang',tinggi_barang='$tinggi_barang',harga_barang='$harga_barang',stok_barang='$stok_barang',tgl_produksi='$tgl_produksi',id_jenis_barang='$jenis_barang',id_gudang='$gudang_barang' where id_barang='$id_barang'");

		if($query==true){ 
			?>
			<script language="JavaScript">
        		alert('Data berhasil Diedit');
    	    	document.location='data-barang.php';
	      	</script>

			<?php
		}else{
			?>
		<script language="JavaScript">
        	alert('Maaf, Terjadi Kesalahan!');
        	document.location='form-edit-barang.php?id_barang=<?php echo $id_barang; ?>';
      	</script> 
		<?php
		}
?>