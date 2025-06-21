<?= $this->include('template/header'); ?>

<h2 style="margin-bottom: 1rem; font-size: 2rem; color: #333;"><?= esc($title); ?></h2>

<!-- 🔍 Filter & Pencarian -->
<form method="get" style="margin-bottom: 2rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
    <input
        type="text"
        name="q"
        placeholder="🔍 Cari judul..."
        value="<?= esc($q); ?>"
        style="padding: 8px; flex: 1; min-width: 200px;">

    <select name="kategori" style="padding: 8px;">
        <option value="">📂 Semua Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= $id_kategori == $k['id_kategori'] ? 'selected' : ''; ?>>
                <?= esc($k['nama_kategori']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<!-- 📰 Daftar Artikel -->
<?php if ($artikel): foreach ($artikel as $row): ?>
<article class="entry" style="margin-bottom: 2.5rem; padding-bottom: 1rem; border-bottom: 1px solid #ddd;">
    <h2 style="margin-bottom: 0.5rem;">
        <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="text-decoration: none; color: #3152d6;">
            <?= esc($row['judul']); ?>
        </a>
    </h2>

    <?php if ($row['gambar']): ?>
        <img src="<?= base_url('gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>"
             style="max-width:100%; height:auto; margin-bottom: 0.8rem; border-radius: 6px;">
    <?php endif; ?>

    <p style="font-size: 0.9rem; color: #777; margin-bottom: 0.8rem;">
        📂 <strong>Kategori:</strong> <?= esc($row['nama_kategori'] ?? '-'); ?>
    </p>

    <p style="line-height: 1.6; color: #444;">
        <?= esc(substr($row['isi'], 0, 200)); ?>...
        <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="color: #3152d6; text-decoration: underline;">Selengkapnya</a>
    </p>
</article>
<?php endforeach; else: ?>
<article class="entry" style="margin-top: 2rem;">
    <h2>Tidak ada artikel ditemukan.</h2>
</article>
<?php endif; ?>

<!-- 📄 Pagination -->
<div class="pagination" style="margin-top: 2rem;">
    <?= $pager->only(['q', 'kategori'])->links(); ?>
</div>

<?= $this->include('template/footer'); ?>