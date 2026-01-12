<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</main>

<!-- Footer -->
<footer class="px-8 py-6 border-t border-white/10 mt-auto">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">
            &copy; <?= date('Y') ?> TokoKita Admin Panel
        </p>
        <p class="text-sm text-gray-500">
            Built with CodeIgniter 3 & Tailwind CSS
        </p>
    </div>
</footer>
</div>
</div>

<script>
    // Confirm delete
    function confirmDelete(url) {
        if (confirm('Yakin ingin menghapus produk ini?')) {
            window.location.href = url;
        }
    }
</script>
</body>

</html>