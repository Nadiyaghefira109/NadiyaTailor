<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

$pelanggan_opt = mysqli_query($koneksi, "SELECT * FROM pelanggan");
$kategori_opt  = mysqli_query($koneksi, "SELECT * FROM kategori");

if (isset($_POST['submit'])) {
    $id_pelanggan   = $_POST['id_pelanggan'];
    $id_kategori    = $_POST['id_kategori'];
    $tgl_masuk      = $_POST['tgl_masuk'];
    $tgl_selesai    = $_POST['tgl_selesai'];
    $status_pesanan = $_POST['status_pesanan'];

    $insert = "INSERT INTO pesanan (id_pelanggan, id_kategori, tgl_masuk, tgl_selesai, status_pesanan) 
               VALUES ('$id_pelanggan', '$id_kategori', '$tgl_masuk', '$tgl_selesai', '$status_pesanan')";
    if (mysqli_query($koneksi, $insert)) {
        header("Location: index.php");
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-3">
            <h5 class="fw-semibold text-dark mb-3">Buat Pesanan</h5>
            <form action="" method="POST">
                <div class="mb-2">
                    <label class="form-label small fw-medium">Pelanggan</label>
                    <select name="id_pelanggan" class="form-select form-select-sm" required>
                        <option value="">-- Pilih --</option>
                        <?php while($p = mysqli_fetch_assoc($pelanggan_opt)) { ?>
                            <option value="<?= $p['id_pelanggan']; ?>"><?= $p['nama_pelanggan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label small fw-medium">Jenis Busana</label>
                    <select name="id_kategori" class="form-select form-select-sm" required>
                        <option value="">-- Pilih --</option>
                        <?php while($k = mysqli_fetch_assoc($kategori_opt)) { ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <label class="form-label small fw-medium">Tgl Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control form-control-sm" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="col">
                        <label class="form-label small fw-medium">Estimasi Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">Status Awal</label>
                    <select name="status_pesanan" class="form-select form-select-sm" required>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Diproses">Diproses</option>
                    </select>
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