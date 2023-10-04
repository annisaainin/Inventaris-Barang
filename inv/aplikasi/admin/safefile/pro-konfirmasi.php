<?php
include '../../koneksi/koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$sekarang = date("Y-m-d G:i:s", strtotime("now"));
// error_reporting(0);
$id_pesanan = $_GET['id_pesanan'];
$kon = $_GET['kon'];
$id_konfirmasi = $_GET['id_konfirmasi'];
$id_kendaraan = $_GET['id_kendaraan'];
$id_pengiriman = $_GET['order'];
$sql = mysqli_query($koneksi,"SELECT * FROM tb_pesanan a inner join tb_toko b on a.id_toko = b.id_toko WHERE a.id_pesanan='$id_pesanan'");
$qry = (mysqli_num_rows($sql));
$row = mysqli_fetch_array($sql);
$id_user = $row['id_user'];
$total_berat = $row['total_berat'];
$jarak_toko = $row['jarak_toko'];


$sql4 = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan WHERE id_kendaraan='$id_kendaraan'");
$row4 = mysqli_fetch_array($sql4);
$batas_sementara = $row4['batas_sementara']+$total_berat;
$kurangberat=$row4['batas_sementara']-$total_berat;
$jarak_sementara = $row4['jarak_sementara'] + $jarak_toko;
$kurangjarak = $row4['jarak_sementara'] - $jarak_toko;



$sql6 = mysqli_query($koneksi,"SELECT * FROM tb_pengiriman a inner join tb_detail_pengiriman b on a.id_pengiriman=b.id_pengiriman WHERE a.id_kendaraan2='$id_kendaraan' AND a.tgl_pengiriman='0000-00-00 00:00:00'");
                    $qry6 = (mysqli_num_rows($sql6));
//

// $kode = 'PG';
// $sql3 = mysqli_query($koneksi,"SELECT MAX(id_pengiriman) as idnew FROM tb_pengiriman");
// $row3 = mysqli_fetch_array($sql3);
// $max_id = $row3['idnew'];
// $max_ids = (int) substr($max_id,5,5);
// $kirim = $max_ids+1;
// $auto = $kode.sprintf("%05s", $kirim);

$sql5 = mysqli_query($koneksi,"SELECT MAX(id_detail_kirim) as idnew FROM tb_detail_pengiriman");
$row5 = mysqli_fetch_array($sql5);
$max_id5 = $row5['idnew']+1;

$sql1 = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id_user='$id_user'");
$qry1 = (mysqli_num_rows($sql1));

if($qry1==1){
    if($qry==1){
        $sql2 = mysqli_query($koneksi, "SELECT * from tb_konfirmasi WHERE id_pesanan='$id_pesanan' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
        $row2 = mysqli_fetch_array($sql2);
        if($kon=="bayar"){
            if($row2['kon_bayar']=='1'){
            $query = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_bayar='2' where id_pesanan='$id_pesanan' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
            //$quer3 = mysqli_query($koneksi,"INSERT INTO tb_pengiriman(id_pengiriman,id_kendaraan2,tgl_pengiriman) VALUES('$auto','-','0000-00-00 00:00:00')")or die(mysqli_error($koneksi));

            $query4 = mysqli_query($koneksi,"INSERT INTO tb_detail_pengiriman(id_detail_kirim,id_pengiriman,id_pesanan) VALUES('$max_id5','-','$id_pesanan')")or die(mysqli_error($koneksi));                
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
            $query2 = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_kirim='1', tgl_kirim='$sekarang' where id_pesanan='$id_pesanan' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
            if($qry6==0){
                $quer3 = mysqli_query($koneksi,"INSERT INTO tb_pengiriman(id_pengiriman,id_kendaraan2,tgl_pengiriman) VALUES('$id_pengiriman','$id_kendaraan','0000-00-00 00:00:00')")or die(mysqli_error($koneksi));
            }
            
            $query4 = mysqli_query($koneksi,"UPDATE tb_detail_pengiriman SET id_pengiriman='$id_pengiriman' where id_pesanan='$id_pesanan'")or die(mysqli_error($koneksi));

            $query5 = mysqli_query($koneksi,"UPDATE tb_kendaraan SET batas_sementara='$batas_sementara', jarak_sementara='$jarak_sementara' where id_kendaraan='$id_kendaraan'")or die(mysqli_error($koneksi));

             ?>
             <script language="JavaScript">
                alert('Data Terkonfirmasi');
                document.location='data-kon-kirim.php';
            </script> 
            <?php   
            }else if($row2['kon_kirim']=='1'){
            $query2 = mysqli_query($koneksi,"UPDATE tb_konfirmasi SET kon_kirim='2', tgl_kirim='$sekarang' where id_pesanan='$id_pesanan' AND id_konfirmasi='$id_konfirmasi'")or die(mysqli_error($koneksi));
            $query5 = mysqli_query($koneksi,"UPDATE tb_kendaraan SET batas_sementara='$kurangberat', jarak_sementara='$kurangjarak' where id_kendaraan='$id_kendaraan'")or die(mysqli_error($koneksi));

            $sql6 = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan WHERE id_kendaraan='$id_kendaraan'");
            $row6 = mysqli_fetch_array($sql6);

            if($row6['batas_sementara']=='0' && $row6['jarak_sementara'] == '0'){
                $query6 = mysqli_query($koneksi,"UPDATE tb_kendaraan SET status_kendaraan='0' where id_kendaraan='$id_kendaraan'")or die(mysqli_error($koneksi));
            }

             ?>
             <script language="JavaScript">
                alert('Data Terkonfirmasi');
                history.back();
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
        }else if($kon=="mobil"){
            header("location: data-pil-kirim.php?id_pesanan=$id_pesanan");
        }else{
            ?>
    		 <script language="JavaScript">
            	alert('Terdapat Kesalahan');
            	document.location='data-kon-kirim.php?id_pesanan=<?php echo $id_pesanan; ?>';
          	</script> 
    		<?php   
        }
    }else{
    ?>
		 <script language="JavaScript">
        	alert('Pesanan tidak tersedia');
        	document.location='data-hpesanan.php';
      	</script> 
		<?php
    }
}else{
    ?>
		 <script language="JavaScript">
        	alert('Users Tidak Terdaftar');
        	document.location='data-hpesanan.php';
      	</script> 
		<?php
}

?>