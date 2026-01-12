<?php
/**
 * Script untuk membuat tabel products di SQLite
 * Jalankan: php application/db/create_table.php
 */

$dbPath = __DIR__ . '/katalog.db';

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buat tabel products
    $pdo->exec('
        CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            price INTEGER NOT NULL,
            description TEXT
        )
    ');

    echo "✅ Tabel 'products' berhasil dibuat!\n";
    echo "📁 Database: $dbPath\n";

    // Cek apakah tabel berhasil dibuat
    $stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='products'");
    if ($stmt->fetch()) {
        echo "✅ Verifikasi: Tabel 'products' ada di database.\n";
    }

} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
