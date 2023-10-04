<?php
include '../../koneksi/koneksi.php';

$noseri=$_POST['noseri'];
$gambar=$_POST['gambar'];
$tipe_barang=$_POST['tipe_barang'];
$nama_barang=$_POST['nama_barang'];
$id_jenis=$_POST['id_jenis'];
$jumlah=$_POST['jumlah'];
$id_kondisi=$_POST['id_kondisi'];
$lokasi=$_POST['lokasi'];

$kode_perawatan=$_POST['kode_perawatan'];
$tgl_perawatan=$_POST['tgl_perawatan'];
$id_status=$_POST['id_status'];
$keterangan=$_POST['keterangan'];

$sql2 = mysqli_query($koneksi, "SELECT MAX(kode_perawatan) as idnew FROM perawatan");
$row2 = mysqli_fetch_array($sql2);
$max_id2 = $row2['idnew'];
$auto2 = $max_id2+1;

$sql = mysqli_query($koneksi,"SELECT * FROM barang WHERE noseri='$noseri'");
$qry = (mysqli_num_rows($sql));

    if($id_kondisi=="1"){
            
        $query = mysqli_query($koneksi,"INSERT INTO perawatan(kode_perawatan,noseri,jumlah,tgl_perawatan,kondisi,id_status,keterangan)VALUES('$auto2','$noseri','$jumlah','$tgl_perawatan','$kondisi','1','$keterangan')")or die(mysqli_error($koneksi));
                    
       // $query3 = mysqli_query($koneksi,"UPDATE tb_detail_pesanan SET id_pesanan='$id_pesanan' where id_user='$id_user' AND id_pesanan='-'")or die(mysqli_error($koneksi));
    header('Location:data-perawatan.php');

    }else if ($id_kondisi=="2") {
        $query = mysqli_query($koneksi,"INSERT INTO perawatan(kode_perawatan,noseri,jumlah,tgl_perawatan,kondisi,id_status,keterangan)VALUES('$auto2','$noseri','$jumlah','$tgl_perawatan','$kondisi','1','$keterangan')")or die(mysqli_error($koneksi));
                    
       // $query3 = mysqli_query($koneksi,"UPDATE tb_detail_pesanan SET id_pesanan='$id_pesanan' where id_user='$id_user' AND id_pesanan='-'")or die(mysqli_error($koneksi));
    header('Location:data-perawatan.php');
    
    }else{
    ?>
    <script language="JavaScript">
    alert('Saat ini Stok Telah Habis, Anda dapat memilih produk rekomendasi lain.');
    document.location='data-cart.php';
    </script> 
    <?php
    }

?>