<?= $this->include('template/admin_header'); ?>

<h2 style="margin-bottom: 0.5rem;">📊 Dashboard Admin</h2>
<p style="color: #666; margin-bottom: 2rem;">
    Halo, <strong><?= esc(session('username')); ?></strong>Selamat bekerja! Di bawah ini ringkasan singkat situs kamu.
</p>

<div style="display: flex; gap: 2rem; flex-wrap: wrap; margin-bottom: 2rem;">
    <div style="flex: 1; min-width: 200px; background: #f8f9ff; padding: 1rem 1.5rem; border-left: 5px solid #3152d6;">
        <h4 style="margin: 0; color: #3152d6;">📝 Artikel</h4>
        <p style="font-size: 2rem; margin: 0;"><strong>123</strong></p>
        <small>Total artikel yang telah dibuat</small>
    </div>

    <div style="flex: 1; min-width: 200px; background: #f8f9ff; padding: 1rem 1.5rem; border-left: 5px solid #2c9c66;">
        <h4 style="margin: 0; color: #2c9c66;">📂 Kategori</h4>
        <p style="font-size: 2rem; margin: 0;"><strong>5</strong></p>
        <small>Total kategori tersedia</small>
    </div>
</div>

<div>
    <p style="color: #555;">Gunakan menu navigasi di atas untuk mulai menambahkan atau mengelola konten portal berita.</p>
</div>

<?= $this->include('template/admin_footer'); ?>
