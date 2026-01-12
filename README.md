# 🛍️ TokoKita - Web Katalog Produk Modern

Workshop pelatihan pembuatan website katalog produk menggunakan **CodeIgniter 3**, **Tailwind CSS**, dan **SQLite**.

---

## 📋 Daftar Isi

1. [Tentang Proyek](#tentang-proyek)
2. [Prerequisites](#prerequisites)
3. [Instalasi](#instalasi)
4. [Struktur Folder](#struktur-folder)
5. [Konfigurasi](#konfigurasi)
6. [Menjalankan Proyek](#menjalankan-proyek)
7. [Panduan Pelatihan](#panduan-pelatihan)
8. [Membuat Halaman User](#membuat-halaman-user)
9. [Troubleshooting](#troubleshooting)

---

## 📖 Tentang Proyek

Proyek ini adalah template untuk pelatihan pembuatan website katalog produk dengan fitur:

| Fitur | Keterangan |
|-------|------------|
| **Admin Panel** | Sidebar navigation dengan dashboard modern |
| **CRUD Produk** | Tambah, lihat, hapus produk |
| **SQLite Database** | Database portable tanpa server |
| **Tailwind CSS** | Styling modern via CDN |
| **Format Rupiah** | Helper untuk format mata uang |

### Kenapa Kombinasi Ini?

- ✅ **Portable** - Tidak butuh install XAMPP/MySQL (cukup PHP built-in server)
- ✅ **Cepat** - Tailwind via CDN tanpa setup Node.js
- ✅ **Mudah Dipahami** - Struktur MVC CI3 sangat jelas untuk pemula

---

## 🔧 Prerequisites

Sebelum mulai, pastikan peserta sudah memiliki:

| Software | Keterangan | Link Download |
|----------|------------|---------------|
| **Text Editor** | VS Code direkomendasikan | [Download](https://code.visualstudio.com/) |
| **PHP** | Minimal versi 7.4 atau 8.x | [Download](https://www.php.net/downloads) |
| **Browser** | Chrome/Edge | - |
| **DB Browser for SQLite** | Opsional, untuk melihat database | [Download](https://sqlitebrowser.org/) |

### Cek Instalasi PHP

```bash
php -v
```

Output yang diharapkan:
```
PHP 8.0.30 (cli) ...
```

---

## 📥 Instalasi

### Langkah 1: Clone atau Download Proyek

```bash
git clone <repository-url>
cd MembangunWebKatalogProdukModern
```

Atau download ZIP dan extract ke folder `htdocs` atau folder proyek Anda.

### Langkah 2: Inisialisasi Database

```bash
php application/db/create_table.php
```

Output:
```
✅ Tabel 'products' berhasil dibuat!
📁 Database: .../application/db/katalog.db
```

### Langkah 3: Jalankan Server

```bash
php -S localhost:8000
```

### Langkah 4: Akses di Browser

- **Admin Panel**: http://localhost:8000/admin/products
- **Website User**: http://localhost:8000 *(akan dibuat saat pelatihan)*

---

## 📁 Struktur Folder

```
MembangunWebKatalogProdukModern/
├── application/
│   ├── config/
│   │   ├── autoload.php      # Library & helper autoload
│   │   ├── config.php        # Base URL config
│   │   ├── database.php      # SQLite connection
│   │   └── routes.php        # URL routing
│   │
│   ├── controllers/
│   │   ├── admin/
│   │   │   └── Products.php  # ✅ Controller admin
│   │   └── Welcome.php       # Default controller
│   │
│   ├── models/
│   │   └── Product_model.php # ✅ Model CRUD
│   │
│   ├── views/
│   │   ├── layout/admin/
│   │   │   ├── header.php    # ✅ Admin sidebar layout
│   │   │   └── footer.php    # ✅ Admin footer
│   │   │
│   │   ├── admin/products/
│   │   │   ├── index.php     # ✅ Tabel produk
│   │   │   └── add.php       # ✅ Form tambah
│   │   │
│   │   └── user/             # 📝 Dibuat saat pelatihan
│   │       ├── layout/
│   │       └── products/
│   │
│   ├── helpers/
│   │   └── rupiah_helper.php # ✅ Format mata uang
│   │
│   └── db/
│       ├── katalog.db        # ✅ SQLite database
│       └── create_table.php  # ✅ Script init DB
│
├── system/                    # Core CI3 (jangan diubah)
├── index.php                  # Entry point
├── TRAINING_WORKFLOW.md       # Panduan lengkap trainer
└── README.md                  # File ini
```

---

## ⚙️ Konfigurasi

### 1. Base URL (`config.php`)

```php
$config['base_url'] = 'http://localhost:8000/';
```

### 2. Autoload (`autoload.php`)

```php
$autoload['libraries'] = array('database', 'session');
$autoload['helper'] = array('url', 'file', 'rupiah');
```

### 3. Database SQLite (`database.php`)

```php
$db['default'] = array(
    'hostname' => 'sqlite:'.APPPATH.'db/katalog.db',
    'dbdriver' => 'pdo',
    // ... config lainnya
);
```

### 4. Routes (`routes.php`)

```php
$route['default_controller'] = 'welcome'; // Halaman user
```

---

## 🚀 Menjalankan Proyek

```bash
# Masuk ke folder proyek
cd MembangunWebKatalogProdukModern

# Jalankan PHP built-in server
php -S localhost:8000
```

Buka browser dan akses:
- **Admin Panel**: `http://localhost:8000/admin/products`

---

## 📚 Panduan Pelatihan

### Rundown Sesi (Total ±4 Jam)

| Sesi | Materi | Durasi |
|------|--------|--------|
| 1 | Persiapan & Instalasi | 30-45 menit |
| 2 | Konfigurasi Database SQLite | 30 menit |
| 3 | Templating dengan Tailwind CSS | 45 menit |
| 4 | Logic Backend - Read Data | 45 menit |
| 5 | Create & Save Data | 45-60 menit |
| 6 | Finishing & Tantangan | Sisa waktu |

📖 **Panduan lengkap ada di file**: [`TRAINING_WORKFLOW.md`](./TRAINING_WORKFLOW.md)

---

## 👤 Membuat Halaman User

Bagian ini adalah **tugas peserta** saat pelatihan. Berikut langkah-langkahnya:

### Langkah 1: Buat Controller User

**File**: `application/controllers/Katalog.php`

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        $data['products'] = $this->product_model->get_all();
        $this->load->view('user/products/index', $data);
    }
}
```

### Langkah 2: Buat Layout User

**Folder structure**:
```
application/views/user/
├── layout/
│   ├── header.php
│   └── footer.php
└── products/
    └── index.php
```

**File**: `application/views/user/layout/header.php`

```php
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoKita - Katalog Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="<?= base_url() ?>" class="text-2xl font-bold text-indigo-600">
                    🛍️ TokoKita
                </a>
                <div class="flex items-center space-x-4">
                    <a href="<?= base_url() ?>" class="text-gray-600 hover:text-indigo-600">
                        Katalog
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <main class="max-w-7xl mx-auto px-4 py-8">
```

**File**: `application/views/user/layout/footer.php`

```php
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    </main>
    <footer class="bg-white border-t py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-500">
                &copy; <?= date('Y') ?> TokoKita. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>
```

### Langkah 3: Buat Halaman Katalog User

**File**: `application/views/user/products/index.php`

```php
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('user/layout/header'); ?>

<!-- Hero Section -->
<div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">
        Selamat Datang di TokoKita
    </h1>
    <p class="text-gray-600 text-lg">
        Temukan produk terbaik dengan harga terjangkau
    </p>
</div>

<!-- Products Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php foreach($products as $product): ?>
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <!-- Product Image -->
        <div class="h-48 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
            <svg class="w-16 h-16 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </div>
        
        <!-- Product Info -->
        <div class="p-5">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                <?= htmlspecialchars($product->name) ?>
            </h3>
            <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                <?= htmlspecialchars($product->description) ?>
            </p>
            <div class="flex items-center justify-between">
                <span class="text-xl font-bold text-indigo-600">
                    <?= rupiah($product->price) ?>
                </span>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                    Detail
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php if(empty($products)): ?>
<div class="text-center py-16">
    <p class="text-gray-500 text-lg">Belum ada produk tersedia.</p>
</div>
<?php endif; ?>

<?php $this->load->view('user/layout/footer'); ?>
```

### Langkah 4: Update Routes

**File**: `application/config/routes.php`

```php
$route['default_controller'] = 'katalog'; // Arahkan ke halaman user
```

### Langkah 5: Test Halaman User

Akses di browser: `http://localhost:8000`

---

## 🎯 Tantangan Tambahan

Setelah peserta menyelesaikan halaman user dasar, berikan tantangan:

1. **Halaman Detail Produk** - Buat halaman untuk menampilkan detail 1 produk
2. **Fitur Search** - Tambah form pencarian produk
3. **Kategori Produk** - Buat tabel kategori dan filter produk
4. **Upload Gambar** - Tambah fitur upload foto produk
5. **Edit Produk** - Lengkapi CRUD dengan fitur edit

---

## 🔧 Troubleshooting

### Error: "Unable to connect to database"
```
✅ Solusi:
1. Pastikan file katalog.db sudah ada di application/db/
2. Jalankan: php application/db/create_table.php
3. Cek path di database.php menggunakan APPPATH
```

### Error: "Class not found"
```
✅ Solusi:
1. Nama file dan class harus sama (case-sensitive)
2. Contoh: file Product_model.php → class Product_model
3. Pastikan sudah di-autoload atau load manual
```

### Halaman Blank / Error 500
```
✅ Solusi:
1. Aktifkan error display di index.php:
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
2. Cek file log di application/logs/
```

### Session Error di Windows
```
✅ Solusi:
Di config.php, set:
$config['sess_save_path'] = sys_get_temp_dir();
```

---

## 📞 Kontak & Dukungan

Jika ada pertanyaan selama pelatihan, hubungi trainer atau buka issue di repository ini.

---

**Happy Coding! 🚀**

*Dibuat dengan ❤️ untuk pelatihan web development*
