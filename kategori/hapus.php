<?php
include '../config/koneksi.php';
/** @var mysqli $koneksi */

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id'");
header("Location: index.php");
?>