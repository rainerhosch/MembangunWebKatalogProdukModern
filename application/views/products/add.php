<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('layout/header'); ?>

<!-- Page Header -->
<div class="mb-8">
    <a href="<?= base_url('products') ?>"
        class="inline-flex items-center text-gray-400 hover:text-white mb-4 transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Katalog
    </a>
    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
        Tambah Produk Baru
    </h1>
    <p class="text-gray-400">
        Isi form berikut untuk menambahkan produk ke katalog
    </p>
</div>

<!-- Form Card -->
<div class="max-w-2xl">
    <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/10 p-6 md:p-8">
        <form action="<?= base_url('products/store') ?>" method="POST">

            <!-- Nama Produk -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                    Nama Produk <span class="text-red-400">*</span>
                </label>
                <input type="text" id="name" name="name" required placeholder="Masukkan nama produk"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
            </div>

            <!-- Harga -->
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-300 mb-2">
                    Harga (Rp) <span class="text-red-400">*</span>
                </label>
                <input type="number" id="price" name="price" required min="0" placeholder="Contoh: 150000"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
            </div>

            <!-- Deskripsi -->
            <div class="mb-8">
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">
                    Deskripsi
                </label>
                <textarea id="description" name="description" rows="4" placeholder="Deskripsi singkat produk (opsional)"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <button type="submit"
                    class="flex-1 bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-xl font-medium hover:shadow-lg hover:shadow-primary/50 transition-all duration-300 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Produk
                </button>
                <a href="<?= base_url('products') ?>"
                    class="flex-1 bg-white/10 text-white px-6 py-3 rounded-xl font-medium hover:bg-white/20 transition-all duration-300 flex items-center justify-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>