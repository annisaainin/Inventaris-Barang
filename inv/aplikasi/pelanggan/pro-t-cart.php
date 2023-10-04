<?php
session_start();
error_reporting(0);
include "../../koneksi/koneksi.php";
// error_reporting(0);
$id_barang = $_POST['barang'];
$id_user = $_SESSION['id_user'];
$kuantitas = $_POST['kuantitas'];
$sql = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id_user='$id_user'");
$qry = (mysqli_num_rows($sql));

$sql1 = mysqli_query($koneksi, "SELECT MAX(id_transaksi) as idnew FROM tb_detail_pesanan");
$row = mysqli_fetch_array($sql1);
$max_id = $row['idnew'];
$auto = $max_id+1;
if($qry==1){
    $sql2 = mysqli_query($koneksi, "SELECT * from tb_detail_pesanan WHERE id_user='$id_user' AND id_barang='$id_barang' AND id_pesanan='-'")or die(mysqli_error($koneksi));
    $row2 = mysqli_fetch_array($sql2);
    $qry2 = (mysqli_num_rows($sql2));
    
    $sql3 = mysqli_query($koneksi, "SELECT * from tb_barang WHERE id_barang='$id_barang'")or die(mysqli_error($koneksi));
    $row3 = mysqli_fetch_array($sql3);
    
    $stok = $row3['stok_barang'];
    if(($stok < 1)==false){
        $satuan = $row3['harga_barang'];
        $totalharga = $kuantitas * $satuan;
        if($qry2==false){
            $query = mysqli_query($koneksi,"INSERT INTO tb_detail_pesanan(id_transaksi,kuantitas_detail,sub_total,detail_total_harga,id_pesanan,id_barang,id_user)VALUES('$auto','$kuantitas','$satuan','$totalharga','-','$id_barang','$id_user')")or die(mysqli_error($koneksi));
        }else{
            $stoklama= $row2['kuantitas_detail'];
            $totalstok = $stoklama + $kuantitas;
            $hargalama= $row2['detail_total_harga'];
            $hargabaru = $hargalama+$totalharga;
            $query3 = mysqli_query($koneksi,"UPDATE tb_detail_pesanan SET kuantitas_detail='$totalstok',sub_total='$satuan',detail_total_harga='$hargabaru' where id_barang='$id_barang'")or die(mysqli_error($koneksi));
        }

        ?>
        
		 <script language="JavaScript">
        	alert('Produk Masuk Keranjang');
        	document.location='data-cart.php';
      	</script> 
		<?php
    }else{
        ?>
		 <script language="JavaScript">
        	alert('Saat ini Stok Telah Habis, Anda dapat memilih produk rekomendasi lain.');
        	document.location='data-barang.php';
      	</script> 
		<?php
    }
}else{
    ?>
		 <script language="JavaScript">
        	alert('Login Terlebih dahulu, sebelum tambahkan cart');
        	document.location='data-barang.php';
      	</script> 
		<?php
}

if(empty($_SESSION)){
         echo "<script>alert('Anda Harus Login Terlebih Dahulu');
        document.location='data-barang.php';
        </script>";
    }
?>