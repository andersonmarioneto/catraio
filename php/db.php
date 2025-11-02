<?php
// db.php — conecta ao Neon via proxy localhost (fallback para URL completa em produção)
$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: 5432;
$db   = getenv('DB_NAME') ?: 'neondb';
$user = getenv('DB_USER') ?: 'neondb_owner';
$pass = getenv('DB_PASS') ?: 'npg_UeD7wNhzo3jX';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
