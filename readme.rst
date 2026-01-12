# 📚 TRAINING WORKFLOW
## Membangun Web Katalog Produk Modern dengan CI3 & SQLite

---

## 🎯 Tujuan Pelatihan

Peserta dapat membangun website katalog produk modern menggunakan:
- **CodeIgniter 3** - Framework PHP MVC
- **Tailwind CSS** - Utility-first CSS framework (via CDN)
- **SQLite** - Database ringan tanpa server

---

## 📋 Prerequisites (Persiapan Peserta)

Pastikan peserta sudah memiliki:

| Software | Keterangan |
|----------|------------|
| **Text Editor** | VS Code direkomendasikan |
| **PHP** | Minimal versi 7.4 atau 8.x |
| **Browser** | Chrome/Edge |
| **DB Browser for SQLite** | Opsional, untuk melihat database |

### Cek Instalasi PHP
```bash
php -v
```

---

## 📅 Rundown Sesi Pelatihan

| Sesi | Materi | Durasi |
|------|--------|--------|
| 1 | Persiapan & Instalasi | 30-45 menit |
| 2 | Konfigurasi Database SQLite | 30 menit |
| 3 | Templating dengan Tailwind CSS | 45 menit |
| 4 | Logic Backend - Read Data | 45 menit |
| 5 | Create & Save Data | 45-60 menit |
| 6 | Finishing & Tantangan | Sisa waktu |

---

# Sesi 1: Persiapan & Instalasi
**⏱️ Durasi: 30-45 Menit**

### Goal
Peserta memiliki CodeIgniter 3 yang berjalan di browser.

### Langkah-langkah

#### 1.1 Download & Extract
1. Download CodeIgniter 3 dari [codeigniter.com](https://codeigniter.com/download)
2. Extract dan rename folder menjadi `toko-sederhana`

#### 1.2 Struktur Folder
Jelaskan folder penting:
```
toko-sederhana/
├── application/          # Kode aplikasi kita
│   ├── config/          # Konfigurasi
│   ├── controllers/     # Controller (C)
│   ├── models/          # Model (M)
│   ├── views/           # View (V)
│   └── helpers/         # Helper functions
├── system/              # Core CI3 (jangan diubah!)
└── index.php            # Entry point
```

#### 1.3 Config Dasar

**File: `application/config/config.php`**
```php
$config['base_url'] = 'http://localhost:8000/';
```

**File: `application/config/autoload.php`**
```php
$autoload['libraries'] = array('database', 'session');
$autoload['helper'] = array('url', 'file', 'rupiah');
```

**File: `application/config/routes.php`**
```php
$route['default_controller'] = 'products';
```

#### 1.4 Running Project
Jalankan tanpa XAMPP menggunakan PHP Built-in Server:
```bash
cd toko-sederhana
php -S localhost:8000
```

Buka browser: `http://localhost:8000`

---

# Sesi 2: Konfigurasi Database SQLite
**⏱️ Durasi: 30 Menit**

### Goal
Terkoneksi dengan database tanpa server MySQL.

### Langkah-langkah

#### 2.1 Persiapan File Database
1. Buat folder `db` di dalam `application/`
2. Buat file kosong `katalog.db`

```
application/
└── db/
    └── katalog.db
```

#### 2.2 Konfigurasi database.php

**File: `application/config/database.php`**
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'      => '',
    'hostname' => 'sqlite:'.APPPATH.'db/katalog.db', // Path ke file
    'username' => '',
    'password' => '',
    'database' => '',
    'dbdriver' => 'pdo',  // Gunakan PDO untuk SQLite
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
```

> ⚠️ **Penting:** Gunakan `pdo` sebagai `dbdriver` untuk SQLite!

#### 2.3 Membuat Tabel Products

Buat file `application/db/create_table.php`:
```php
<?php
$pdo = new PDO('sqlite:'.__DIR__.'/katalog.db');
$pdo->exec('
    CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price INTEGER NOT NULL,
        description TEXT
    )
');
echo "Table created!";
```

Jalankan:
```bash
php application/db/create_table.php
```

---

# Sesi 3: Templating dengan Tailwind CSS
**⏱️ Durasi: 45 Menit**

### Goal
Membuat layout utama (Master Template) yang responsif.

### Langkah-langkah

#### 3.1 Strategi CDN
Gunakan Tailwind via CDN (tanpa Node.js):
```html
<script src="https://cdn.tailwindcss.com"></script>
```

#### 3.2 Buat Struktur Views
```
application/views/
├── layout/
│   ├── header.php
│   └── footer.php
└── products/
    ├── index.php
    └── add.php
```

#### 3.3 Header Template

**File: `application/views/layout/header.php`**
```php
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white/10 backdrop-blur-lg border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="<?= base_url() ?>" class="text-white font-bold text-xl">
                    🛍️ TokoKita
                </a>
                <a href="<?= base_url('products/create') ?>" 
                   class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-4 py-2 rounded-xl">
                    + Tambah Produk
                </a>
            </div>
        </div>
    </nav>
    <main class="max-w-7xl mx-auto px-4 py-8">
```

#### 3.4 Footer Template

**File: `application/views/layout/footer.php`**
```php
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    </main>
    <footer class="bg-white/5 border-t border-white/10 py-6 text-center">
        <p class="text-gray-400 text-sm">
            TokoKita © <?= date('Y') ?> - Dibuat dengan ❤️
        </p>
    </footer>
</body>
</html>
```

---

# Sesi 4: Logic Backend (MVC) - Read Data
**⏱️ Durasi: 45 Menit**

### Goal
Menampilkan data dari SQLite ke layar.

### Langkah-langkah

#### 4.1 Model

**File: `application/models/Product_model.php`**
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('products')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('products', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('products', ['id' => $id]);
    }
}
```

#### 4.2 Controller

**File: `application/controllers/Products.php`**
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        $data['products'] = $this->product_model->get_all();
        $this->load->view('products/index', $data);
    }

    public function create()
    {
        $this->load->view('products/add');
    }

    public function store()
    {
        $data = [
            'name'        => $this->input->post('name'),
            'price'       => (int) $this->input->post('price'),
            'description' => $this->input->post('description')
        ];

        $this->product_model->insert($data);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        redirect('products');
    }

    public function delete($id)
    {
        $this->product_model->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        redirect('products');
    }
}
```

#### 4.3 View Index

**File: `application/views/products/index.php`**
```php
<?php $this->load->view('layout/header'); ?>

<h1 class="text-3xl font-bold text-white mb-6">Katalog Produk</h1>

<?php if(!empty($products)): ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <?php foreach($products as $product): ?>
    <div class="bg-white/10 rounded-2xl p-5 border border-white/10">
        <h3 class="text-lg font-semibold text-white">
            <?= htmlspecialchars($product->name) ?>
        </h3>
        <p class="text-gray-400 text-sm my-2">
            <?= htmlspecialchars($product->description) ?>
        </p>
        <div class="flex items-center justify-between mt-4">
            <span class="text-xl font-bold text-indigo-400">
                <?= rupiah($product->price) ?>
            </span>
            <a href="<?= base_url('products/delete/'.$product->id) ?>" 
               onclick="return confirm('Yakin hapus?')"
               class="text-red-400 hover:text-red-300">
                Hapus
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
<div class="text-center py-16">
    <p class="text-gray-400">Belum ada produk</p>
</div>
<?php endif; ?>

<?php $this->load->view('layout/footer'); ?>
```

---

# Sesi 5: Create & Save Data
**⏱️ Durasi: 45-60 Menit**

### Goal
Membuat form input produk dan menyimpannya.

### Langkah-langkah

#### 5.1 Helper Rupiah

**File: `application/helpers/rupiah_helper.php`**
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}
```

#### 5.2 View Form Tambah

**File: `application/views/products/add.php`**
```php
<?php $this->load->view('layout/header'); ?>

<h1 class="text-3xl font-bold text-white mb-6">Tambah Produk Baru</h1>

<div class="max-w-lg">
    <form action="<?= base_url('products/store') ?>" method="POST"
          class="bg-white/10 rounded-2xl p-6 border border-white/10">
        
        <div class="mb-4">
            <label class="block text-gray-300 mb-2">Nama Produk</label>
            <input type="text" name="name" required
                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 mb-2">Harga (Rp)</label>
            <input type="number" name="price" required min="0"
                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white">
        </div>

        <div class="mb-6">
            <label class="block text-gray-300 mb-2">Deskripsi</label>
            <textarea name="description" rows="3"
                      class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white"></textarea>
        </div>

        <button type="submit" 
                class="w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-3 rounded-xl font-medium">
            Simpan Produk
        </button>
    </form>
</div>

<?php $this->load->view('layout/footer'); ?>
```

---

# Sesi 6: Finishing & Tantangan
**⏱️ Durasi: Sisa Waktu**

### Fitur Opsional

1. **Flash Message** - Notifikasi sukses/gagal
2. **Validasi Input** - Menggunakan form_validation CI3
3. **Upload Gambar** - Menambahkan foto produk
4. **Edit Produk** - CRUD lengkap

### Tantangan untuk Peserta

1. Tambahkan fitur **Edit Produk**
2. Buat fitur **Search/Filter** produk
3. Implementasi **Pagination**
4. Tambahkan **Kategori Produk**

---

# 🔧 Troubleshooting

### Error: "Unable to connect to database"
- Pastikan file `katalog.db` sudah dibuat
- Cek path di `database.php` menggunakan `APPPATH`
- Pastikan `dbdriver` adalah `pdo`

### Error: "Class not found"
- Cek nama file dan class harus sama (case-sensitive)
- Pastikan sudah di-autoload atau di-load manual

### Halaman Blank
- Aktifkan error display di `index.php`:
```php
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

---

# 📁 Struktur Final Project

```
toko-sederhana/
├── application/
│   ├── config/
│   │   ├── autoload.php     ✅ Dimodifikasi
│   │   ├── config.php       ✅ Dimodifikasi
│   │   ├── database.php     ✅ Dimodifikasi
│   │   └── routes.php       ✅ Dimodifikasi
│   ├── controllers/
│   │   └── Products.php     ✅ Baru
│   ├── db/
│   │   └── katalog.db       ✅ Baru
│   ├── helpers/
│   │   └── rupiah_helper.php ✅ Baru
│   ├── models/
│   │   └── Product_model.php ✅ Baru
│   └── views/
│       ├── layout/
│       │   ├── header.php   ✅ Baru
│       │   └── footer.php   ✅ Baru
│       └── products/
│           ├── index.php    ✅ Baru
│           └── add.php      ✅ Baru
├── system/
└── index.php
```

---

# ✅ Checklist Verifikasi

- [ ] PHP Server berjalan di `localhost:8000`
- [ ] Homepage menampilkan daftar produk
- [ ] Form tambah produk berfungsi
- [ ] Data tersimpan ke database
- [ ] Tombol hapus berfungsi
- [ ] Format Rupiah tampil dengan benar

---

**Happy Coding! 🚀**
