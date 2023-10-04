<?php 
include '../../koneksi/koneksi.php';
$id_pesanan=$_POST['id_pesanan'];
$tgl_pesan=$_POST['tgl_pesan'];
$total_keseluruhan=$_POST['total_keseluruhan'];
$des_penjualan=$_POST['des_penjualan'];
$status_bayar=$_POST['status_bayar'];
$id_barang=$_POST['id_barang'];
$id_toko=$_POST['id_toko'];

$query = mysqli_query($koneksi,"INSERT INTO tb_pesanan(id_pesanan,tgl_pesan,total_keseluruhan,des_penjualan,status_bayar,id_barang,id_toko) VALUES('$id_pesanan','$tgl_pesan','$total_keseluruhan','$des_penjualan','$status_bayar','$id_barang','$id_toko')")or die(mysqli_error($koneksi));

		if(($query)==1){ 
			?>
			<script language="JavaScript">
	        	alert('Data berhasil Ditambahkan');
	        	document.location='data-pesanan.php';
	      	</script>
		<?php
		}else{
		?>
		<script language="JavaScript">
        	alert('Terjadi Kesalahan Input!');
        	document.location='form-tambah-pesanan.php?id_pesanan=<?php echo $id_pesanan; ?>';
      	</script>
		<?php
		}
		?>