<?= $this->include('template/header'); ?>

<article class="entry">
    <h2 style="margin-bottom: 0.5rem;">📰 <?= esc($artikel['judul']); ?></h2>

    <p style="margin-bottom: 1rem;">
        <strong>📂 Kategori:</strong> <?= esc($artikel['nama_kategori'] ?? 'Tidak diketahui'); ?>
    </p>

    <?php if (!empty($artikel['gambar'])) : ?>
        <img src="<?= base_url('gambar/' . $artikel['gambar']); ?>"
             alt="<?= esc($artikel['judul']); ?>"
             style="display: block; max-width:100%; height:auto; margin: 0 auto 20px auto; border-radius: 8px;">
    <?php endif; ?>

    <p style="line-height: 1.7; text-align: justify;">
        <?= esc($artikel['isi']); ?>
    </p>
</article>

<hr class="divider" style="margin: 3rem 0;" />

<a href="<?= base_url('/artikel'); ?>" class="btn" style="display: inline-block; margin-top: 1rem;">
    ← Kembali ke daftar artikel
</a>

<?= $this->include('template/footer'); ?>