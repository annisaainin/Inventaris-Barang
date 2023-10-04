<?php

include('../../koneksi/koneksi.php');
$id = $_GET["id_gambar"];
$image = mysqli_query($koneksi,"SELECT * FROM tb_detail_gambar where id_gambar='$id'");
$data = mysqli_fetch_array($image);
if(isset($id))
{
 $file_path = '../assets/all/image/'.$data["file_gambar"];
 if(unlink($file_path))
 {
  $query = mysqli_query($koneksi,"DELETE FROM tb_detail_gambar WHERE id_gambar = '$id'");
  header('location: '.$_SERVER['HTTP_REFERER']);
 }
}
?>