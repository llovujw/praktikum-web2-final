<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div style="max-width: 700px; margin: 0 auto; text-align: center;">
    <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Hubungi Kami</h1>
    <p style="color: #555; margin-bottom: 2rem;">
        Punya pertanyaan, kritik, atau ingin bekerja sama? Tim <strong>BeritaKu</strong> siap mendengarkan kamu!
    </p>

    <div style="background: #f2f6ff; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <p style="margin-bottom: 1rem; font-size: 1.1rem;">
            📧 <strong>Email:</strong><br>
            <a href="mailto:berita@example.com">berita@example.com</a>
        </p>
        <p style="margin-bottom: 1rem; font-size: 1.1rem;">
            📞 <strong>Telepon:</strong><br>
            <a href="tel:081234567890">0812-3456-7890</a>
        </p>
        <p style="font-size: 1.1rem;">
            📍 <strong>Alamat Redaksi:</strong><br>
            Jl. Jurnalistik No. 12, Kota Media, Indonesia
        </p>
    </div>

    <p style="margin-top: 2rem; font-size: 0.95rem; color: #888;">
        Kami akan membalas pesan Anda secepat mungkin selama jam kerja.
    </p>
</div>

<?= $this->endSection() ?>