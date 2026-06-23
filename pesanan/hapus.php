<?php
include '../config/koneksi.php';
/** @var mysqli $koneksi */

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = '$id'");
header("Location: index.php");
?>