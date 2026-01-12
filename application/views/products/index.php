<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('layout/header'); ?>

<!-- Page Header -->
<div class="mb-8">
    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
        Katalog Produk
    </h1>
    <p class="text-gray-400">
        Temukan produk terbaik untuk kebutuhan Anda
    </p>
</div>

<!-- Flash Message -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="bg-green-500/20 border border-green-500/50 text-green-300 px-4 py-3 rounded-xl mb-6 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Products Grid -->
<?php if (!empty($products)): ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($products as $product): ?>
            <div
                class="group bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/10 hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/20 hover:-translate-y-1">
                <!-- Product Image Placeholder -->
                <div class="h-48 bg-gradient-to-br from-primary/30 to-secondary/30 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>

                <!-- Product Info -->
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-white mb-2 truncate">
                        <?= htmlspecialchars($product->name) ?>
                    </h3>
                    <p class="text-gray-400 text-sm mb-4 line-clamp-2 h-10">
                        <?= htmlspecialchars($product->description) ?>
                    </p>
                    <div class="flex items-center justify-between">
                        <span
                            class="text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                            <?= rupiah($product->price) ?>
                        </span>
                        <a href="<?= base_url('products/delete/' . $product->id) ?>"
                            onclick="return confirm('Yakin ingin menghapus produk ini?')"
                            class="p-2 text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <!-- Empty State -->
    <div class="text-center py-16">
        <div class="w-24 h-24 bg-white/10 rounded-full mx-auto mb-6 flex items-center justify-center">
            <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Produk</h3>
        <p class="text-gray-400 mb-6">Mulai tambahkan produk pertama Anda</p>
        <a href="<?= base_url('products/create') ?>"
            class="inline-flex items-center bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-xl font-medium hover:shadow-lg hover:shadow-primary/50 transition-all duration-300">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Produk Pertama
        </a>
    </div>
<?php endif; ?>

<?php $this->load->view('layout/footer'); ?>