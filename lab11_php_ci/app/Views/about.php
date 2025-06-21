<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div style="max-width: 700px; margin: 0 auto;">
    <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">👥 Tentang Kami</h1>

    <p style="color: #555; line-height: 1.7; margin-bottom: 1.5rem;">
        <strong>BeritaKu</strong> adalah portal berita sederhana yang dibuat sebagai bagian dari tugas praktikum <em>Web Programming</em> menggunakan framework <strong>CodeIgniter 4</strong>.
        Meski bersifat akademis, situs ini dirancang untuk menghadirkan pengalaman membaca berita yang nyaman, ringan, dan tetap informatif.
    </p>

    <p style="color: #555; line-height: 1.7; margin-bottom: 1.5rem;">
        Melalui project ini, kami mempelajari konsep routing, controller, model, view, autentikasi, REST API, hingga frontend dinamis menggunakan Vue.js. 
        Semua fitur dibangun dengan tujuan agar mudah dikembangkan di masa depan.
    </p>

    <div style="background-color: #f2f6ff; padding: 1.5rem; border-left: 4px solid #3152d6; border-radius: 8px;">
        <p style="margin: 0;">
        📌 Website ini merupakan implementasi langsung dari modul praktikum Pemrograman Web 2. Seluruh fitur dikembangkan sesuai arahan dosen sebagai bagian dari evaluasi dan pemahaman framework PHP modern.
        </p>
    </div>
</div>

<?= $this->endSection() ?>