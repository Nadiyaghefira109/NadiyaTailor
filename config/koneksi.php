    <?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "penjahit_nadiya";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

date_default_timezone_set('Asia/Jakarta');
?>