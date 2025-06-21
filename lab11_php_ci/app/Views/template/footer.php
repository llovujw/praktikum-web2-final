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