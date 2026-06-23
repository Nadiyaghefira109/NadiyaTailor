<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

if (isset($_POST['submit'])) {
    $nama_pelanggan = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
    $no_telepon     = mysqli_real_escape_string($koneksi, $_POST['no_telepon']);
    $alamat         = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $query = "INSERT INTO pelanggan (nama_pelanggan, no_telepon, alamat) VALUES ('$nama_pelanggan', '$no_telepon', '$alamat')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Berhasil disimpan'); window.location='index.php';</script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-3">
            <h5 class="fw-semibold text-dark mb-3">Tambah Pelanggan</h5>
            <form action="" method="POST">
                <div class="mb-2">
                    <label class="form-label small fw-medium">Nama</label>
                    <input type="text" name="nama_pelanggan" class="form-control form-control-sm" required>
                </div>
                <div class="mb-2">
                    <label class="form-label small fw-medium">No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" placeholder="Contoh: 0812345" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">Alamat</label>
                    <textarea name="alamat" class="form-control form-control-sm" rows="2" required></textarea>
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