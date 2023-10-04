<?php
include '../../koneksi/koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$sekarang = date("Y-m-d G:i:s", strtotime("now"));
// error_reporting(0);
$id_nota = $_GET['id_nota'];
$kon = $_GET['kon'];
$id_konfirmasi = $_GET['id_konfirmasi'];
$sql = mysqli_query($koneksi,"SELECT * FROM tb_nota_penjualan WHERE id_nota='$id_nota'");
$qry = (mysqli_num_rows($sql));
$row = mysqli_fetch_array($sql);
$id_pelanggan = $row['id_pelanggan'];

$sql1 = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
$qry1 = (mysqli_num_rows($sql1));

if($qry1==1){
    if($qry==1){
        $sql2 = mysqli_query($koneksi, "SELECT * from tb_konfirmasi WHERE id_nota='$id_nota' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
        $row2 = mysqli_fetch_array($sql2);
        if($kon=="bayar"){
            if($row2['kon_bayar']=='1'){
            $query = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_bayar='2' where id_nota='$id_nota' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
                
            ?>
    		 <script language="JavaScript">
            	alert('Data Terkonfirmasi');
            	document.location='data-kon-pembayaran.php';
          	</script> 
    		<?php   
            }else{
            ?>
    		 <script language="JavaScript">
            	alert('Terdapat Kesalahan');
            	document.location='data-kon-pembayaran.php';
          	</script> 
    		<?php   
            }
        }else if($kon=="kirim"){
            if($row2['kon_kirim']=='0'){
            $query2 = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_kirim='1', tgl_kirim='$sekarang' where id_nota='$id_nota' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
             ?>
    		 <script language="JavaScript">
            	alert('Data Terkonfirmasi');
            	document.location='data-kon-kirim.php';
          	</script> 
    		<?php   
            }else if($row2['kon_kirim']=='1'){
            $query2 = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_kirim='2', tgl_kirim='$sekarang' where id_nota='$id_nota' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
             ?>
    		 <script language="JavaScript">
            	alert('Data Terkonfirmasi');
            	document.location='data-kon-kirim.php';
          	</script> 
    		<?php   
            }else{
            ?>
    		 <script language="JavaScript">
            	alert('Terdapat Kesalahan');
            	document.location='data-kon-kirim.php';
          	</script> 
    		<?php   
            }
        }else{
            ?>
    		 <script language="JavaScript">
            	alert('Terdapat Kesalahan');
            	document.location='data-kon-kirim.php';
          	</script> 
    		<?php   
        }
    }else{
    ?>
		 <script language="JavaScript">
        	alert('Nota tidak tersedia');
        	document.location='data-kon-pembayaran.php';
      	</script> 
		<?php
    }
}else{
    ?>
		 <script language="JavaScript">
        	alert('Pelanggan Tidak Terdaftar');
        	document.location='data-kon-pembayaran.php';
      	</script> 
		<?php
}

?>