<?php
include '../../koneksi/koneksi.php';

$kode_pinjam = $_GET['kode_pinjam'];
$sql = $koneksi->query("SELECT * FROM pinjam WHERE kode_pinjam='$kode_pinjam'");
$result = $sql->fetch_assoc();
?>

<title>Preview PDF</title>

<embed src="tanda terima/<?= $result['upload_tandaterima'];?>" type="application/pdf" width="100%" height="100%">