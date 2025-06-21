<?= $this->include('template/admin_header'); ?>

<h2 style="margin-bottom: 1.5rem;">➕ <?= esc($title); ?></h2>

<form action="" method="post" enctype="multipart/form-data">
    <p style="margin-bottom: 1.2rem;">
        <input type="text" name="judul" id="judul" placeholder="📌 Judul Artikel" required style="width: 100%;">
    </p>

    <p>
        <textarea name="isi" id="isi" cols="50" rows="10" placeholder="📝 Tulis isi lengkap artikel..." required style="width: 100%;"></textarea>
    </p>

    <p>
        <input type="file" name="gambar" id="gambar" style="width: 100%;">
    </p>

    <p>
        <select name="id_kategori" id="id_kategori" required style="width: 100%;">
            <option value="">📂 Pilih Kategori</option>
            <?php foreach ($kategori as $k) : ?>
                <option value="<?= $k['id_kategori']; ?>"><?= esc($k['nama_kategori']); ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <p style="margin-bottom: 1.5rem;">
        <input type="submit" value="🚀 Publikasikan Artikel" class="btn btn-large">
    </p>
</form>

<?= $this->include('template/admin_footer'); ?>