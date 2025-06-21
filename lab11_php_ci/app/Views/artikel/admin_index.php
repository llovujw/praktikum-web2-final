<?= $this->include('template/admin_header'); ?>

<h2>📋 <?= esc($title); ?></h2>

<!-- Form Pencarian + Filter -->
<div class="row mb-3">
    <div class="col-md-6">
        <form id="search-form" class="form-inline">
            <input type="text" name="q" id="search-box" value="<?= esc($q); ?>" class="form-control mr-2" placeholder="🔍 Cari artikel...">
            <select name="kategori_id" id="category-filter" class="form-control mr-2">
                <option value="">📂 Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= esc($k['nama_kategori']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="🔎 Cari" class="btn btn-primary">
        </form>
    </div>
</div>

<!-- Tempat Data Artikel & Pagination -->
<div id="article-container"></div>
<div id="pagination-container"></div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Script AJAX -->
<script>
$(document).ready(function() {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');

    const fetchData = (url) => {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id);
            }
        });
    };

    const renderArticles = (articles) => {
        let html = `
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>📝 Judul</th>
                    <th>📁 Kategori</th>
                    <th>📌 Status</th>
                    <th>⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody>`;

        if (articles.length > 0) {
            articles.forEach(article => {
                html += `
                <tr>
                    <td>${article.id}</td>
                    <td>
                        <strong>${article.judul}</strong><br>
                        <small>${article.isi.substring(0, 50)}...</small>
                    </td>
                    <td>${article.nama_kategori}</td>
                    <td>${article.status == 1 ? '✅ Publish' : '🕓 Draft'}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="/admin/artikel/edit/${article.id}">✏️ Ubah</a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus artikel ini?');" href="/admin/artikel/delete/${article.id}">🗑️ Hapus</a>
                    </td>
                </tr>`;
            });
        } else {
            html += `<tr><td colspan="5">😕 Belum ada artikel yang ditemukan.</td></tr>`;
        }

        html += `</tbody></table>`;
        articleContainer.html(html);
    };

    const renderPagination = (pager, q, kategori_id) => {
        let html = '<nav><ul class="pagination">';
        pager.links.forEach(link => {
            let url = link.url ? `${link.url}&q=${encodeURIComponent(q)}&kategori_id=${encodeURIComponent(kategori_id)}` : '#';
            html += `<li class="page-item ${link.active ? 'active' : ''}">
                        <a class="page-link" href="${url}">${link.title}</a>
                    </li>`;
        });
        html += '</ul></nav>';
        paginationContainer.html(html);
    };

    // Form submit
    searchForm.on('submit', function(e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        fetchData(`/admin/artikel?q=${q}&kategori_id=${kategori_id}`);
    });

    // Dropdown change auto-submit
    categoryFilter.on('change', function() {
        searchForm.trigger('submit');
    });

    // Pagination click
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        fetchData(url);
    });

    // Load pertama
    fetchData('/admin/artikel');
});
</script>

<?= $this->include('template/admin_footer'); ?>