<?php

use Illuminate\Support\Facades\DB;

try {
    // Connect tanpa database name dulu
    $pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
    $pdo->exec("CREATE DATABASE IF NOT EXISTS spj_laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database 'spj_laravel' created successfully!\n";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage() . "\n";
}
