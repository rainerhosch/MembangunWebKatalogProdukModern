<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Format angka ke format Rupiah Indonesia
 * 
 * @param int|float $angka Angka yang akan diformat
 * @return string Format Rupiah (contoh: Rp 1.500.000)
 */
if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}
