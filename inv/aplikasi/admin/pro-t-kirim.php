<?php
session_start();
error_reporting(0);
  include "../../koneksi/koneksi.php";
// error_reporting(0);
$id_pesanan = $_POST['id_pesanan'];
$tgl_pesanan = $_POST['tgl_pesanan'];
 $total_kuantitas = $_POST['total_kuantitas'];
$harga_kg = $_POST['harga_kg'];
$harga_km = $_POST['harga_km'];
$total_cashback = $_POST['total_cashback'];
$total_keseluruhan = $_POST['total_keseluruhan'];
$des_pesanan = $_POST['des_pesanan'];
$id_user = $_SESSION['id_user'];
$id_toko = $_POST['id_toko'];
$id_metode = $_POST['id_metode'];
$status_bayar = $_POST['status_bayar'];

$sql4 = mysqli_query($koneksi, "SELECT MAX(id_konfirmasi) as idnew FROM tb_konfirmasi");
$row4 = mysqli_fetch_array($sql4);
$max_id4 = $row4['idnew'];
$auto4 = $max_id4+1;

$sql = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id_user='$id_user'");
$qry = (mysqli_num_rows($sql));

if($qry==true){
    
        $sql3 = mysqli_query($koneksi, "SELECT * from tb_detail_pesanan a inner join tb_barang b on a.id_barang=b.id_barang WHERE a.id_user='$id_user' AND a.id_pesanan='-'")or die(mysqli_error($koneksi));
        while($row3 = mysqli_fetch_array($sql3)){
            if($row3['kuantitas_detail'] <= $row3['stok_barang']){
                $stastok = "ada";
            }
        }
        
    
    if($stastok=="ada"){
        
             $query = mysqli_query($koneksi,"INSERT INTO tb_pesanan(id_pesanan,tgl_pesanan,total_kuantitas,harga_kg,harga_km,total_cashback,total_keseluruhan,des_pesanan,id_user,id_toko,id_metode,status_bayar)VALUES('$id_pesanan','$tgl_pesanan','$total_kuantitas','$harga_kg','$harga_km','$total_cashback','$total_keseluruhan','$des_pesanan','$id_user','$id_toko','$id_metode','$status_bayar')")or die(mysqli_error($koneksi));
             
             $query = mysqli_query($koneksi,"INSERT INTO tb_konfirmasi(id_konfirmasi,kon_bayar,tgl_bayar,kon_kirim,tgl_kirim,kon_sampai,tgl_sampai,id_pesanan)VALUES('$auto4','0','0000-00-00 00:00:00','0','0000-00-00 00:00:00','0','0000-00-00 00:00:00','$id_pesanan')")or die(mysqli_error($koneksi));
            
             $query3 = mysqli_query($koneksi,"UPDATE tb_detail_pesanan SET id_pesanan='$id_pesanan' where id_user='$id_user' AND id_pesanan='-'")or die(mysqli_error($koneksi));
            header('Location:data-hpesanan.php');
            
    }else{
        ?>
		 <script language="JavaScript">
        	alert('Saat ini Stok Telah Habis, Anda dapat memilih produk rekomendasi lain.');
        	document.location='data-cart.php';
      	</script> 
		<?php
    }
}else{
    ?>
		 <script language="JavaScript">
        	alert('Login Terlebih dahulu, sebelum melakukan checkout');
        	document.location='../../index.php';
      	</script> 
		<?php
}

if(empty($_SESSION)){
         echo "<script>alert('Anda Harus Login Terlebih Dahulu');
        document.location='../../index.php';
        </script>";
    }
?>