### 1. **CodeIgniter 4 (PHP Framework)**

> Framework utama untuk membangun backend / server-side logic.

* Digunakan untuk menangani **routing**, **MVC (Model-View-Controller)**, dan manajemen aplikasi server-side.
* Menyediakan struktur folder modular, fitur View Cell, Layouting, Validasi Form, Upload Gambar, Pagination, hingga RESTful API.

📦 Contoh penggunaan:

* `app/Controllers/Artikel.php`
* `app/Models/ArtikelModel.php`
* `app/Views/artikel/detail.php`

---

### 2. **MySQL / MariaDB**

> Sistem manajemen basis data relasional (RDBMS) untuk menyimpan data dinamis.

* Digunakan untuk menyimpan data artikel, kategori, user, dsb.
* Diakses via Query Builder dari CodeIgniter (misal: `$db->table()->get()`).
* Tabel `artikel` terhubung dengan `kategori` melalui foreign key (relasi many-to-one).

📦 Disimpan di:

* `config/Database.php`
* dan digunakan di `ArtikelModel`, `UserModel`, dll.

---

### 3. **AJAX (jQuery)**

> Digunakan untuk mengambil atau menghapus data **tanpa reload halaman** (asynchronous).

* Dipakai dalam modul **artikel admin (admin\_index)**.
* Data ditampilkan dan dimanipulasi via JavaScript + jQuery `.ajax()`.
* Backend menyediakan endpoint di `AjaxController` untuk `GET` & `DELETE`.

📦 Contoh:

```javascript
$.ajax({
  url: "/ajax/getData",
  method: "GET",
  success: function(data) {
    // render data artikel ke table
  }
});
```

---

### 4. **VueJS 3 + Axios**

> Library frontend JavaScript modern untuk membangun tampilan interaktif + SPA-style.

* VueJS 3 digunakan di **praktikum 11** (frontend app) untuk menampilkan dan memanipulasi artikel via form & tabel.
* `axios` digunakan untuk komunikasi HTTP (GET, POST, PUT, DELETE) ke REST API CodeIgniter 4.
* App berbasis komponen dan reactive data binding.

📦 Contoh:

```javascript
axios.post('http://localhost/lab11_php_ci/public/post', this.formData)
```

---

### 5. **HTML5 + CSS3**

> Teknologi markup dan styling untuk membangun antarmuka web yang responsif dan user-friendly.

* HTML digunakan untuk membuat struktur halaman (form, tabel, section).
* CSS3 digunakan untuk mempercantik layout (warna, spacing, font).
* Beberapa modul memakai inline CSS, class `.btn`, `.table`, atau bahkan style custom di layout/admin.

📦 Lokasi file:

* `style.css`
* `assets/css/style.css` (Vue frontend)

---

## 💡 Kesimpulan

Dengan kombinasi ini kamu berhasil membuat:

* Admin panel (CodeIgniter)
* REST API backend
* AJAX dashboard
* Frontend VueJS interaktif
* Sistem upload + pagination + login
* Dan semuanya terhubung ke database MySQL/MariaDB
