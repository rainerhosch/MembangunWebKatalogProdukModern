<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
$page_title = 'Daftar Produk';
$page_subtitle = 'Kelola semua produk di toko Anda';
$this->load->view('layout/admin/header', compact('page_title', 'page_subtitle')); 
?>

<!-- Flash Message -->
<?php if($this->session->flashdata('success')): ?>
<div class="bg-green-500/20 border border-green-500/50 text-green-300 px-4 py-3 rounded-xl mb-6 flex items-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
    </svg>
    <?= $this->session->flashdata('success') ?>
</div>
<?php endif; ?>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-gradient-to-br from-primary/20 to-primary/5 rounded-2xl p-6 border border-primary/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Produk</p>
                <p class="text-3xl font-bold text-white mt-1"><?= count($products) ?></p>
            </div>
            <div class="w-12 h-12 bg-primary/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-br from-green-500/20 to-green-500/5 rounded-2xl p-6 border border-green-500/20">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Nilai</p>
                <p class="text-2xl font-bold text-white mt-1">
                    <?php 
                    $total = 0;
                    foreach($products as $p) $total += $p->price;
                    echo rupiah($total);
                    ?>
                </p>
            </div>
            <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
    <a href="<?= base_url('admin/products/create') ?>" 
       class="bg-gradient-to-br from-secondary/20 to-secondary/5 rounded-2xl p-6 border border-secondary/20 hover:border-secondary/50 transition-all group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Aksi Cepat</p>
                <p class="text-lg font-semibold text-white mt-1 group-hover:text-secondary transition-colors">+ Tambah Produk</p>
            </div>
            <div class="w-12 h-12 bg-secondary/20 rounded-xl flex items-center justify-center group-hover:bg-secondary/30 transition-all">
                <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
        </div>
    </a>
</div>

<!-- Products Table -->
<div class="bg-slate-800/50 rounded-2xl border border-white/10 overflow-hidden">
    <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-white">Semua Produk</h2>
        <span class="text-sm text-gray-400"><?= count($products) ?> item</span>
    </div>

    <?php if(!empty($products)): ?>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-slate-700/50">
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Produk</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-4 text-center text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php $no = 1; foreach($products as $product): ?>
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-gray-400"><?= $no++ ?></span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary/30 to-secondary/30 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <span class="text-white font-medium"><?= htmlspecialchars($product->name) ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-gray-400 text-sm line-clamp-2 max-w-xs">
                            <?= htmlspecialchars($product->description) ?: '-' ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-primary font-semibold"><?= rupiah($product->price) ?></span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <button onclick="confirmDelete('<?= base_url('admin/products/delete/'.$product->id) ?>')"
                                    class="p-2 text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all"
                                    title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <!-- Empty State -->
    <div class="text-center py-16">
        <div class="w-20 h-20 bg-white/5 rounded-full mx-auto mb-6 flex items-center justify-center">
            <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Produk</h3>
        <p class="text-gray-400 mb-6">Mulai tambahkan produk pertama Anda ke katalog</p>
        <a href="<?= base_url('admin/products/create') ?>" 
           class="inline-flex items-center bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-xl font-medium hover:shadow-lg hover:shadow-primary/50 transition-all">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Produk Pertama
        </a>
    </div>
    <?php endif; ?>
</div>

<?php $this->load->view('layout/admin/footer'); ?>