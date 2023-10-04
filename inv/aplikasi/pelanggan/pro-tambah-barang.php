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

$query = mysqli_query($koneksi,"INSERT INTO tb_barang(id_barang,nama_barang,berat_barang,lebar_barang,tinggi_barang,harga_barang,stok_barang,tgl_produksi,id_jenis_barang,id_gudang) VALUES('$id_barang','$nama_barang','$berat_barang','$lebar_barang','$tinggi_barang','$harga_barang','$stok_barang','$tgl_produksi','$jenis_barang','$gudang_barang')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-barang.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-barang.php?id_barang=<?php echo $id_barang; ?>';
      	</script>
		<?php
		}
		?>