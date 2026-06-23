<?php 
include '../config/koneksi.php';
/** @var mysqli $koneksi */

include '../includes/header.php';

$query = "SELECT pesanan.*, pelanggan.nama_pelanggan, kategori.nama_kategori, kategori.harga_dasar 
          FROM pesanan 
          JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan
          JOIN kategori ON pesanan.id_kategori = kategori.id_kategori
          ORDER BY pesanan.id_pesanan DESC";
$result = mysqli_query($koneksi, $query);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-semibold text-dark m-0">Transaksi Pesanan</h4>
    <a href="tambah.php" class="btn btn-sm btn-primary">Tambah</a>
</div>

<div class="card p-2">
    <div class="table-responsive">
        <table class="table table-sm table-hover align-middle m-0">
            <thead>
                <tr>
                    <th class="p-2">ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Pakaian</th>
                    <th>Harga</th>
                    <th>Tgl Masuk</th>
                    <th>Estimasi Selesai</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="p-2 text-muted">#<?= $row['id_pesanan']; ?></td>
                    <td class="fw-medium"><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                    <td>Rp <?= number_format($row['harga_dasar'], 0, ',', '.'); ?></td>
                    <td class="small text-muted"><?= date('d/m/Y', strtotime($row['tgl_masuk'])); ?></td>
                    <td class="small text-muted"><?= date('d/m/Y', strtotime($row['tgl_selesai'])); ?></td>
                    <td>
                        <?php
                        $st = $row['status_pesanan'];
                        // Bootstrap 5 Subtle (Cerah & Lembut)
                        $badge = ($st == 'Menunggu') ? 'bg-warning-subtle text-warning-emphasis' : (($st == 'Diproses') ? 'bg-info-subtle text-info-emphasis' : (($st == 'Selesai') ? 'bg-success-subtle text-success-emphasis' : 'bg-primary-subtle text-primary-emphasis'));
                        ?>
                        <span class="badge <?= $badge; ?> font-monospace fw-normal border" style="font-size: 0.75rem;"><?= $st; ?></span>
                    </td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $row['id_pesanan']; ?>" class="btn btn-sm btn-light border text-warning px-2 py-1"><i class="fas fa-edit small"></i></a>
                        <a href="hapus.php?id=<?= $row['id_pesanan']; ?>" class="btn btn-sm btn-light border text-danger px-2 py-1" onclick="return confirm('Hapus transaksi?')"><i class="fas fa-trash small"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>