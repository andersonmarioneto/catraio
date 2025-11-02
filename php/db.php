<?php
// URL do Neon (produção) — use getenv() no Netlify
$url = "postgresql://neondb_owner:npg_UeD7wNhzo3jX@ep-lucky-base-ah29697m-pooler.c-3.us-east-1.aws.neon.tech/neondb?sslmode=require&channel_binding=require";

// Para produção no Netlify, use:
// $url = getenv("NETLIFY_DATABASE_URL");

$parts = parse_url($url);

$user = $parts["user"];
$pass = $parts["pass"];
$host = $parts["host"];
$port = $parts["port"] ?? 5432;
$db   = ltrim($parts["path"], "/");

// DSN para PDO Postgres
$dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
