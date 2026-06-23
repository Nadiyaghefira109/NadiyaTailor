<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

if (isset($_POST['submit'])) {
    $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
    $harga_dasar   = mysqli_real_escape_string($koneksi, $_POST['harga_dasar']);

    $query = "INSERT INTO kategori (nama_kategori, harga_dasar) VALUES ('$nama_kategori', '$harga_dasar')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-3">
            <h5 class="fw-semibold text-dark mb-3">Tambah Kategori</h5>
            <form action="" method="POST">
                <div class="mb-2">
                    <label class="form-label small fw-medium">Nama Jenis Pakaian</label>
                    <input type="text" name="nama_kategori" class="form-control form-control-sm" placeholder="Misal: Kebaya" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">Harga Dasar (Rp)</label>
                    <input type="number" name="harga_dasar" class="form-control form-control-sm" placeholder="150000" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-sm btn-light border">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>