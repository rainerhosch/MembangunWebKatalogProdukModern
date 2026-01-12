<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - TokoKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#8b5cf6',
                        sidebar: '#1e1b4b'
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(99, 102, 241, 0.2) 0%, transparent 100%);
            border-left: 3px solid #6366f1;
        }
    </style>
</head>
<body class="bg-slate-900 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-sidebar border-r border-white/10 fixed h-full">
            <!-- Logo -->
            <div class="p-6 border-b border-white/10">
                <a href="<?= base_url('admin/products') ?>" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-white font-bold text-lg">TokoKita</span>
                        <span class="block text-xs text-gray-400">Admin Panel</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2">
                <p class="text-xs text-gray-500 uppercase tracking-wider px-3 mb-4">Menu Utama</p>
                
                <a href="<?= base_url('admin/products') ?>" 
                   class="sidebar-link flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-white transition-all <?= $this->uri->segment(2) == 'products' && $this->uri->segment(3) == '' ? 'active' : '' ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span>Daftar Produk</span>
                </a>

                <a href="<?= base_url('admin/products/create') ?>" 
                   class="sidebar-link flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-white transition-all <?= $this->uri->segment(3) == 'create' ? 'active' : '' ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Produk</span>
                </a>

                <div class="pt-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wider px-3 mb-4">Pengaturan</p>
                    
                    <a href="<?= base_url() ?>" target="_blank"
                       class="sidebar-link flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        <span>Lihat Website</span>
                    </a>
                </div>
            </nav>

            <!-- Footer Sidebar -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
                <div class="flex items-center space-x-3 px-3 py-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-bold">A</span>
                    </div>
                    <div>
                        <p class="text-sm text-white">Admin</p>
                        <p class="text-xs text-gray-400">Trainer</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Header -->
            <header class="bg-slate-800/50 backdrop-blur-lg border-b border-white/10 sticky top-0 z-10">
                <div class="px-8 py-4 flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-semibold text-white"><?= isset($page_title) ? $page_title : 'Dashboard' ?></h1>
                        <p class="text-sm text-gray-400"><?= isset($page_subtitle) ? $page_subtitle : 'Kelola data toko Anda' ?></p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-400"><?= date('l, d F Y') ?></span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-8">