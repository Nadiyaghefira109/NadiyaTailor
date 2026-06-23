<?php
$base_url = "http://localhost/NadiyaTailor/";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nadiya Tailor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #b8e5fe;
            color: #495057;
            padding-bottom: 60px;
        }

        .navbar {
            background-color: #ececec !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 600;
            color: #212529 !important;
        }

        .nav-link {
            color: #5c636a !important;
            font-size: 0.95rem;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
        }

        .table th {
            background-color: #f8f9fa !important;
            color: #495057;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light border-bottom mb-4 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= $base_url; ?>index.php"><i class="fas fa-cut text-primary me-2"></i>Nadiya Tailor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= $base_url; ?>index.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $base_url; ?>pelanggan/index.php">Pelanggan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $base_url; ?>kategori/index.php">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $base_url; ?>pesanan/index.php">Pesanan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">