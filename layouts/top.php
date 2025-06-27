<?php 
  include'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Landing page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="libs/bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .hero {
      background: url('./assets/img/header.jpeg') no-repeat center center;
      background-size: cover;
      height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-shadow: 1px 1px 3px #000;
    }
    .card img {
      height: 180px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">LiburanGEH.id</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="./">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#video">Daftar Paket Wisata</a></li>
        <li class="nav-item"><a class="nav-link" href="?hal=daftar_pesanan">Modifikasi Pesanan</a></li>
      </ul>
    </div>
  </div>
</nav>