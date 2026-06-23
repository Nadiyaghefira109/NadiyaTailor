<?php 
include 'config/koneksi.php';
/** @var mysqli $koneksi */

include 'includes/header.php';

$count_pelanggan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pelanggan"))['total'];
$count_kategori  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kategori"))['total'];
$count_pesanan   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesanan"))['total'];
$proses_pesanan  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesanan WHERE status_pesanan='Diproses'"))['total'];
?>

<div class="mb-4 py-2 border-bottom">
    <h2 class="fw-semibold text-dark m-0">Ringkasan Sistem</h2>
    <p class="text-muted small m-0">Selamat datang kembali. Berikut data operasional toko jahitan hari ini.</p>
</div>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card p-3 border-start border-primary border-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small uppercase fw-medium">Pelanggan</div>
                    <h3 class="m-0 fw-bold text-dark"><?= $count_pelanggan; ?></h3>
                </div>
                <div class="text-primary"><i class="fas fa-users fa-xl"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-start border-success border-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small uppercase fw-medium">Kategori Busana</div>
                    <h3 class="m-0 fw-bold text-dark"><?= $count_kategori; ?></h3>
                </div>
                <div class="text-success"><i class="fas fa-tags fa-xl"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-start border-warning border-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small uppercase fw-medium">Total Pesanan</div>
                    <h3 class="m-0 fw-bold text-dark"><?= $count_pesanan; ?></h3>
                </div>
                <div class="text-warning"><i class="fas fa-shopping-bag fa-xl"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-start border-info border-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small uppercase fw-medium">Sedang Dijahit</div>
                    <h3 class="m-0 fw-bold text-dark"><?= $proses_pesanan; ?></h3>
                </div>
                <div class="text-info"><i class="fas fa-spinner fa-xl"></i></div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
