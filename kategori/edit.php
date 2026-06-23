<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id'"));

if (isset($_POST['update'])) {
    $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
    $harga_dasar   = mysqli_real_escape_string($koneksi, $_POST['harga_dasar']);

    mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori', harga_dasar='$harga_dasar' WHERE id_kategori='$id'");
    header("Location: index.php");
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-3">
            <h5 class="fw-semibold text-dark mb-3">Ubah Kategori</h5>
            <form action="" method="POST">
                <div class="mb-2">
                    <label class="form-label small fw-medium">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control form-control-sm" value="<?= htmlspecialchars($data['nama_kategori']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">Harga Dasar (Rp)</label>
                    <input type="number" name="harga_dasar" class="form-control form-control-sm" value="<?= htmlspecialchars($data['harga_dasar']); ?>" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-sm btn-light border">Batal</a>
                    <button type="submit" name="update" class="btn btn-sm btn-warning text-dark fw-medium">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>