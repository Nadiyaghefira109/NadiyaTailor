<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan = '$id'"));

$pelanggan_opt = mysqli_query($koneksi, "SELECT * FROM pelanggan");
$kategori_opt  = mysqli_query($koneksi, "SELECT * FROM kategori");

if (isset($_POST['update'])) {
    $id_pelanggan   = $_POST['id_pelanggan'];
    $id_kategori    = $_POST['id_kategori'];
    $tgl_masuk      = $_POST['tgl_masuk'];
    $tgl_selesai    = $_POST['tgl_selesai'];
    $status_pesanan = $_POST['status_pesanan'];

    $update = "UPDATE pesanan SET 
               id_pelanggan='$id_pelanggan', id_kategori='$id_kategori', 
               tgl_masuk='$tgl_masuk', tgl_selesai='$tgl_selesai', status_pesanan='$status_pesanan' 
               WHERE id_pesanan='$id'";
    if (mysqli_query($koneksi, $update)) {
        header("Location: index.php");
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-3">
            <h5 class="fw-semibold text-dark mb-3">Ubah Status / Detail</h5>
            <form action="" method="POST">
                <div class="mb-2">
                    <label class="form-label small fw-medium">Nama Pelanggan</label>
                    <select name="id_pelanggan" class="form-select form-select-sm" required>
                        <?php while($p = mysqli_fetch_assoc($pelanggan_opt)) { ?>
                            <option value="<?= $p['id_pelanggan']; ?>" <?= ($p['id_pelanggan'] == $data['id_pelanggan']) ? 'selected' : ''; ?>><?= $p['nama_pelanggan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label small fw-medium">Kategori Busana</label>
                    <select name="id_kategori" class="form-select form-select-sm" required>
                        <?php while($k = mysqli_fetch_assoc($kategori_opt)) { ?>
                            <option value="<?= $k['id_kategori']; ?>" <?= ($k['id_kategori'] == $data['id_kategori']) ? 'selected' : ''; ?>><?= $k['nama_kategori']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <label class="form-label small fw-medium">Tgl Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control form-control-sm" value="<?= $data['tgl_masuk']; ?>" required>
                    </div>
                    <div class="col">
                        <label class="form-label small fw-medium">Estimasi Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control form-control-sm" value="<?= $data['tgl_selesai']; ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">Status Kerja</label>
                    <select name="status_pesanan" class="form-select form-select-sm" required>
                        <option value="Menunggu" <?= ($data['status_pesanan'] == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                        <option value="Diproses" <?= ($data['status_pesanan'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                        <option value="Selesai" <?= ($data['status_pesanan'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                        <option value="Diambil" <?= ($data['status_pesanan'] == 'Diambil') ? 'selected' : ''; ?>>Diambil</option>
                    </select>
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