<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

$query = "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC";
$result = mysqli_query($koneksi, $query);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-semibold text-dark m-0">Data Pelanggan</h4>
    <a href="tambah.php" class="btn btn-sm btn-primary">Tambah</a>
</div>

<div class="card p-2">
    <div class="table-responsive">
        <table class="table table-sm table-hover align-middle m-0">
            <thead>
                <tr>
                    <th width="10%" class="p-2">ID</th>
                    <th width="25%">Nama</th>
                    <th width="20%">No. Telepon</th>
                    <th width="30%">Alamat</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0) { ?>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="p-2 text-muted">#<?= $row['id_pelanggan']; ?></td>
                        <td class="fw-medium"><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                        <td><?= htmlspecialchars($row['no_telepon']); ?></td>
                        <td class="text-muted small"><?= htmlspecialchars($row['alamat']); ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-sm btn-light border text-warning px-2 py-1"><i class="fas fa-edit small"></i></a>
                            <a href="hapus.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-sm btn-light border text-danger px-2 py-1" onclick="return confirm('Hapus pelanggan?')"><i class="fas fa-trash small"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3 small">Data masih kosong.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
