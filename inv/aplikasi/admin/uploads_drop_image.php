<?php
session_start();
include('../../koneksi/koneksi.php');
$id = $_GET['barang'];

 $query4 = mysqli_query($koneksi,"SELECT MAX(id_gambar) as idnew FROM tb_detail_gambar")or die(mysqli_error($koneksi));
                    $row4 = mysqli_fetch_array($query4);

                    $max_id = $row4['idnew'];
                    $ini_id = $max_id+1;

if(count($_FILES["file"]["name"]) > 0)
{
 sleep(3);
 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
  if(file_already_uploaded($file_name, $connect))
  {
   $file_name = $file_array[0].'-'.rand().'.'.$file_extension;
  }
  $location = '../assets/all/image/'.$file_name;
  if(move_uploaded_file($tmp_name,$location))
  {
    mysqli_query($koneksi,"INSERT INTO tb_detail_gambar VALUES('$ini_id','$file_name','$id')") or die(mysqli_error());
  }
 }

}
function file_already_uploaded($file_name, $connect)
{

 $query = mysqli_query($koneksi,"SELECT * FROM tb_detail_gambar WHERE file_gambar = '$file_name'");
 $number_of_rows = mysqli_num_rows($query);
 if($number_of_rows > 0)
 {
  return true;
 }
 else
 {
  return false;
 }
}

?>
