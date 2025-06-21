<?= $this->include('template/header'); ?>

<h1 style="margin-bottom: 1.5rem;">📄 Data Artikel (AJAX)</h1>

<!-- ✅ Tabel Artikel -->
<table id="artikelTable" style="width: 100%; border-collapse: collapse;">
    <thead style="background-color: #3152d6; color: white;">
        <tr>
            <th style="padding: 12px;">ID</th>
            <th style="padding: 12px;">Judul</th>
            <th style="padding: 12px;">Status</th>
            <th style="padding: 12px;">Aksi</th>
        </tr>
    </thead>
    <tbody style="background-color: #f9f9f9;">
        <tr>
            <td colspan="4" style="text-align: center; padding: 20px;">Memuat data...</td>
        </tr>
    </tbody>
</table>

<!-- jQuery -->
<script src="<?= base_url('assets/js/jquery-3.7.1.min.js'); ?>"></script>

<script>
$(document).ready(function () {
    const $tbody = $('#artikelTable tbody');

    function showLoadingMessage() {
        $tbody.html('<tr><td colspan="4" style="text-align:center; padding: 20px;">⏳ Sedang memuat data artikel...</td></tr>');
    }

    function loadData() {
        showLoadingMessage();
        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET",
            dataType: "json",
            success: function (data) {
                if (!data.length) {
                    $tbody.html('<tr><td colspan="4" style="text-align:center; padding: 20px;">📭 Belum ada data.</td></tr>');
                    return;
                }

                let tableBody = "";
                data.forEach(row => {
                    tableBody += `
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 10px;">${row.id}</td>
                            <td style="padding: 10px;">${row.judul}</td>
                            <td style="padding: 10px;">${row.status == 1 ? '✅ Publish' : '📝 Draft'}</td>
                            <td style="padding: 10px;">
                                <a href="<?= base_url('artikel/edit/') ?>${row.id}" style="padding: 6px 12px; background-color: #2c9c66; color: white; border-radius: 4px; text-decoration: none; margin-right: 5px;">Edit</a>
                                <a href="#" class="btn-delete" data-id="${row.id}" style="padding: 6px 12px; background-color: #d9534f; color: white; border-radius: 4px; text-decoration: none;">Hapus</a>
                            </td>
                        </tr>`;
                });

                $tbody.html(tableBody);
            },
            error: function () {
                $tbody.html('<tr><td colspan="4" style="text-align:center; padding: 20px;">❌ Gagal mengambil data.</td></tr>');
            }
        });
    }

    // Initial Load
    loadData();

    // Handle Delete
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        const id = $(this).data('id');

        if (confirm('🗑️ Yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('artikel/delete/') ?>" + id,
                method: "DELETE",
                success: function () {
                    loadData();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Gagal menghapus data: ' + textStatus + ' - ' + errorThrown);
                }
            });
        }
    });
});
</script>

<?= $this->include('template/footer'); ?>