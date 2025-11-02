<?php
$url = "postgresql://neondb_owner:npg_UeD7wNhzo3jX@ep-lucky-base-ah29697m-pooler.c-3.us-east-1.aws.neon.tech/neondb?sslmode=require&channel_binding=require";

$parts = parse_url($url);

$user = $parts["user"];
$pass = $parts["pass"];
$host = $parts["host"];
$port = $parts["port"] ?? 5432;
$db   = ltrim($parts["path"], "/");

// Adicionando o endpoint nas opções
$endpoint = "ep-lucky-base-ah29697m";

$dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require;options=--endpoint=$endpoint";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "Conectado com sucesso!";
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}