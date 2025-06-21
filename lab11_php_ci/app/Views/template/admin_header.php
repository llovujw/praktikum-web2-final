<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin - Portal Berita' ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
    <div id="container">
        <header>
            <h1>🛠️ Admin Panel</h1>
            <p class="tagline">Kelola konten portal berita dengan mudah</p>
        </header>

        <nav>
            <a href="<?= base_url('/admin'); ?>" class="active">📊 Dashboard</a>
            <a href="<?= base_url('/admin/artikel'); ?>">📝 Artikel</a>
            <a href="<?= base_url('/admin/artikel/add'); ?>">➕ Tambah Artikel</a>
        </nav>

        <section id="wrapper">
            <section id="main">