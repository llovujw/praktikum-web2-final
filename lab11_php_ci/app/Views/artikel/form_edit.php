<?= $this->include('template/admin_header'); ?>

<h2 style="margin-bottom: 1.5rem;">✏️ <?= esc($title); ?></h2>

<form action="<?= base_url('/admin/artikel/edit/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <p style="margin-bottom: 1.2rem;">
        <input
            type="text"
            name="judul"
            id="judul"
            placeholder="📌 Judul Artikel"
            value="<?= esc(old('judul', $data['judul'] ?? '')); ?>"
            required
            style="width: 100%; padding: 8px;">
    </p>

    <p style="margin-bottom: 1.2rem;">
        <textarea
            name="isi"
            id="isi"
            cols="50"
            rows="10"
            placeholder="📝 Tulis isi lengkap artikel..."
            required
            style="width: 100%; padding: 8px;"><?= esc(old('isi', $data['isi'] ?? '')); ?></textarea>
    </p>

    <p style="margin-bottom: 1.2rem;">
        <input
            type="file"
            name="gambar"
            id="gambar"
            style="width: 100%;">
        <?php if (!empty($data['gambar'])) : ?>
            <br><small>📷 Gambar saat ini:</small><br>
            <img src="<?= base_url('gambar/' . $data['gambar']); ?>" alt="Gambar Artikel" style="max-width: 200px; margin-top: 10px;">
        <?php endif; ?>
    </p>

    <p style="margin-bottom: 1.2rem;">
        <select
            name="id_kategori"
            id="id_kategori"
            required
            style="width: 100%; padding: 8px;">
            <option value="">📂 Pilih Kategori</option>
            <?php foreach ($kategori as $k) : ?>
                <option value="<?= $k['id_kategori']; ?>"
                    <?= old('id_kategori', $data['id_kategori'] ?? '') == $k['id_kategori'] ? 'selected' : ''; ?>>
                    <?= esc($k['nama_kategori']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <input type="submit" value="💾 Simpan Perubahan" class="btn btn-large">
    </p>
</form>

<?= $this->include('template/admin_footer'); ?>