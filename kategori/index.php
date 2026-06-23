<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

$query = "SELECT * FROM kategori ORDER BY id_kategori DESC";
$result = mysqli_query($koneksi, $query);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-semibold text-dark m-0">Kategori Busana</h4>
    <a href="tambah.php" class="btn btn-sm btn-primary">Tambah</a>
</div>

<div class="card p-2">
    <div class="table-responsive">
        <table class="table table-sm table-hover align-middle m-0">
            <thead>
                <tr>
                    <th width="15%" class="p-2">ID</th>
                    <th width="50%">Nama Kategori</th>
                    <th width="20%">Harga Jasa</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="p-2 text-muted">#<?= $row['id_kategori']; ?></td>
                    <td class="fw-medium"><?= htmlspecialchars($row['nama_kategori']); ?></td>
                    <td>Rp <?= number_format($row['harga_dasar'], 0, ',', '.'); ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $row['id_kategori']; ?>" class="btn btn-sm btn-light border text-warning px-2 py-1"><i class="fas fa-edit small"></i></a>
                        <a href="hapus.php?id=<?= $row['id_kategori']; ?>" class="btn btn-sm btn-light border text-danger px-2 py-1" onclick="return confirm('Hapus kategori?')"><i class="fas fa-trash small"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>