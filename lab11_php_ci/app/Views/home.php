<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="hero" style="padding: 2rem; text-align: center; background: linear-gradient(135deg, #5778ff, #9eafff); color: white; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <h1 style="font-size: 2.5rem; margin-bottom: 0.5rem;">📰 Selamat Datang di <strong>BeritaKu</strong>!</h1>
    <p style="font-size: 1.2rem;">Portal berita sederhana, cepat, dan informatif — dibuat dengan ❤️ pakai CodeIgniter 4.</p>
</div>

<section style="margin-top: 3rem; text-align: center;">
    <h2 style="margin-bottom: 1rem;">📢 Temukan Berita Terkini</h2>
    <p>Klik menu <strong>Artikel</strong> untuk melihat daftar berita terbaru, atau login sebagai admin untuk mengelola konten portal.</p>
    <a href="<?= base_url('artikel'); ?>" style="display: inline-block; margin-top: 1rem; padding: 10px 20px; background-color: #5778ff; color: white; border-radius: 5px; text-decoration: none;">Lihat Artikel</a>
</section>

<?= $this->endSection() ?>