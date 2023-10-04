<?php
session_start();
include '../../koneksi/koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$sekarang = date("Y-m-d G:i:s", strtotime("now"));
// error_reporting(0);
$id_pesanan = $_GET['id_pesanan'];
$kon = $_GET['kon'];
$id_user = $_SESSION['id_user'];
$sql = mysqli_query($koneksi,"SELECT * FROM tb_konfirmasi WHERE id_pesanan='$id_pesanan'");
$qry = (mysqli_num_rows($sql));
$row = mysqli_fetch_array($sql);
$id_konfirmasi = $row['id_konfirmasi'];

$sql1 = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id_user='$id_user'");
$qry1 = (mysqli_num_rows($sql1));

if($qry1==1){
    if($qry==1){
        $sql2 = mysqli_query($koneksi, "SELECT * from tb_konfirmasi WHERE id_pesanan='$id_pesanan' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
        $row2 = mysqli_fetch_array($sql2);
        if($kon=="bayar"){
            if($row2['kon_bayar']=='0'){
            $query = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_bayar='1', tgl_bayar='$sekarang' where id_pesanan='$id_pesanan' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
            ?>
    		 <script language="JavaScript">
            	alert('Data Terkonfirmasi');
            	document.location='data-kon.php?id_pesanan=<?php echo $id_pesanan; ?>';
          	</script> 
    		<?php   
            }else{
            ?>
    		 <script language="JavaScript">
            	alert('Terdapat Kesalahan');
            	document.location='data-kon.php?id_pesanan=<?php echo $id_pesanan; ?>';
          	</script> 
    		<?php   
            }
        }else if($kon=="sampai"){
            if($row2['kon_sampai']=='0'){
            $query2 = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_sampai='1', tgl_sampai='$sekarang' where id_pesanan='$id_pesanan' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
             ?>
    		 <script language="JavaScript">
            	alert('Data Terkonfirmasi');
            	document.location='data-kon.php?id_pesanan=<?php echo $id_pesanan; ?>';
          	</script> 
    		<?php   
            }else{
            ?>
    		 <script language="JavaScript">
            	alert('Terdapat Kesalahan');
            	document.location='data-kon.php?id_pesanan=<?php echo $id_pesanan; ?>';
          	</script> 
    		<?php   
            }
        }else{
            ?>
    		 <script language="JavaScript">
            	alert('Terdapat Kesalahan');
            	document.location='data-kon.php?id_pesanan=<?php echo $id_pesanan; ?>';
          	</script> 
    		<?php   
        }
    }else{
    ?>
		 <script language="JavaScript">
        	alert('Nota tidak tersedia');
        	document.location='index.php';
      	</script> 
		<?php
    }
}else{
    ?>
		 <script language="JavaScript">
        	alert('Login Terlebih dahulu, sebelum tambahkan cart');
        	document.location='masuk.php';
      	</script> 
		<?php
}

if(empty($_SESSION)){
         echo "<script>alert('Anda Harus Login Terlebih Dahulu');
        document.location='masuk.php';
        </script>";
    }
?>