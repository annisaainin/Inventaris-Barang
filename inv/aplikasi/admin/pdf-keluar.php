<?php
include '../../koneksi/koneksi.php';

$kode_keluar = $_GET['kode_keluar'];
$sql = $koneksi->query("SELECT * FROM keluar WHERE kode_keluar='$kode_keluar'");
$result = $sql->fetch_assoc();
?>

<title>Preview PDF</title>

<embed src="surat keluar/<?= $result['suratkeluar'];?>" type="application/pdf" width="100%" height="100%">