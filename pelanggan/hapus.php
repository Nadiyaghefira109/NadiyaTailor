<?php
include '../config/koneksi.php';
/** @var mysqli $koneksi */

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id'");
header("Location: index.php");
?>