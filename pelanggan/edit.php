<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'"));

if (isset($_POST['update'])) {
    $nama_pelanggan = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
    $no_telepon     = mysqli_real_escape_string($koneksi, $_POST['no_telepon']);
    $alamat         = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $update = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_telepon='$no_telepon', alamat='$alamat' WHERE id_pelanggan='$id'";
    if (mysqli_query($koneksi, $update)) {
        echo "<script>alert('Berhasil diperbarui'); window.location='index.php';</script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-3">
            <h5 class="fw-semibold text-dark mb-3">Ubah Pelanggan</h5>
            <form action="" method="POST">
                <div class="mb-2">
                    <label class="form-label small fw-medium">Nama</label>
                    <input type="text" name="nama_pelanggan" class="form-control form-control-sm" value="<?= htmlspecialchars($data['nama_pelanggan']); ?>" required>
                </div>
                <div class="mb-2">
                    <label class="form-label small fw-medium">No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control form-control-sm" value="<?= htmlspecialchars($data['no_telepon']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">Alamat</label>
                    <textarea name="alamat" class="form-control form-control-sm" rows="2" required><?= htmlspecialchars($data['alamat']); ?></textarea>
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