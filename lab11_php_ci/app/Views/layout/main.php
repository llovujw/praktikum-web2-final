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
                <?= $this->renderSection('content') ?>
            </section>

            <aside id="sidebar">
                <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>

                <div class="widget-box">
                    <h3 class="title">📌 Info Penting</h3>
                    <ul>
                        <li><a href="#">Panduan Penggunaan Situs</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <div class="widget-box">
                    <h3 class="title">🧠 Fun Fact</h3>
                    <p>Tahukah kamu? Indonesia menempati posisi teratas pengguna teknologi AI di Asia Tenggara!</p>
                </div>
            </aside>
        </section>

        <footer>
            <p>&copy; <?= date('Y'); ?> - <strong>BeritaKu</strong> | Dibuat dengan ❤️ oleh Virginia Mahasiswa Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>