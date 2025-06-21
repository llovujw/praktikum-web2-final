<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'BeritaKu - Portal Berita' ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
<div id="container">
    <header>
        <h1>📰 BeritaKu</h1>
        <p class="tagline">Sumber informasi terpercaya, setiap hari.</p>
    </header>

    <nav>
        <a href="<?= base_url('/'); ?>" class="active">🏠 Beranda</a>
        <a href="<?= base_url('/artikel'); ?>">📝 Artikel</a>
        <a href="<?= base_url('/about'); ?>">ℹ️ Tentang</a>
        <a href="<?= base_url('/contact'); ?>">📞 Kontak</a>
    </nav>

    <section id="wrapper">
        <section id="main">