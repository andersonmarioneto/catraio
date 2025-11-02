<?php
require "db.php";

$nome  = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$sms   = $_POST["sms"] ?? "";

if ($nome && $email && $sms) {
    $sql = "INSERT INTO mensagem (nome, email, sms) VALUES (:n, :e, :s)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":n" => $nome,
            ":e" => $email,
            ":s" => $sms
        ]);

        header("Location: ../index.php?sucesso=1");
        exit;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Preencha todos os campos.";
}
