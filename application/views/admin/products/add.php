<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
$page_title = 'Tambah Produk Baru';
$page_subtitle = 'Tambahkan produk baru ke katalog toko';
$this->load->view('layout/admin/header', compact('page_title', 'page_subtitle')); 
?>

<!-- Breadcrumb -->
<div class="mb-6">
    <a href="<?= base_url('admin/products') ?>" class="inline-flex items-center text-gray-400 hover:text-white transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar Produk
    </a>
</div>

<!-- Form Card -->
<div class="max-w-2xl">
    <div class="bg-slate-800/50 rounded-2xl border border-white/10 overflow-hidden">
        <div class="px-6 py-4 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Informasi Produk</h2>
            <p class="text-sm text-gray-400">Isi data produk dengan lengkap</p>
        </div>

        <form action="<?= base_url('admin/products/store') ?>" method="POST" class="p-6 space-y-6">
            
            <!-- Nama Produk -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                    Nama Produk <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       required
                       placeholder="Contoh: Laptop ASUS VivoBook"
                       class="w-full px-4 py-3 bg-slate-700/50 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
            </div>

            <!-- Harga -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-300 mb-2">
                    Harga (Rp) <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">Rp</span>
                    <input type="number" 
                           id="price" 
                           name="price" 
                           required
                           min="0"
                           placeholder="0"
                           class="w-full pl-12 pr-4 py-3 bg-slate-700/50 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                </div>
                <p class="text-xs text-gray-500 mt-1">Masukkan harga tanpa titik atau koma</p>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">
                    Deskripsi
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="4"
                          placeholder="Deskripsi singkat tentang produk..."
                          class="w-full px-4 py-3 bg-slate-700/50 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex items-center space-x-4 pt-4 border-t border-white/10">
                <button type="submit" 
                        class="flex-1 bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-xl font-medium hover:shadow-lg hover:shadow-primary/50 transition-all flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Produk
                </button>
                <a href="<?= base_url('admin/products') ?>" 
                   class="px-6 py-3 bg-white/10 text-white rounded-xl font-medium hover:bg-white/20 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<?php $this->load->view('layout/admin/footer'); ?>