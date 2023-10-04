<?php
include '../../koneksi/koneksi.php';

$kode_masuk = $_GET['kode_masuk'];
$sql = $koneksi->query("SELECT * FROM masuk WHERE kode_masuk='$kode_masuk'");
$result = $sql->fetch_assoc();
?>

<title>Preview PDF</title>

<embed src="surat masuk/<?= $result['suratmasuk'];?>" type="application/pdf" width="100%" height="100%">