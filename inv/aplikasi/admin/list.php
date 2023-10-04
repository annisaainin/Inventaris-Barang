[
<?php
 	include "../../koneksi/koneksi.php";
    $sql = mysqli_query($koneksi, "SELECT * from tb_gudang")or die(mysqli_error($koneksi));
    $result = '';
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <?php  $result.='"'.$data['nama_gudang'].'",'; 
    ?>
<?php } $result = rtrim($result,','); echo $result; ?>

]