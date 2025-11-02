<?php require "php/db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mensagens</title>
</head>
<body>

<h3>Enviar mensagem</h3>
<form method="POST" action="php/add.php">
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <textarea name="sms" placeholder="Mensagem" required></textarea><br><br>
    <button type="submit">Enviar</button>
</form>

<hr>

<h3>Mensagens recebidas</h3>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Mensagem</th>
    </tr>

<?php
$sql = "SELECT * FROM mensagem ORDER BY id DESC";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td>{$row['sms']}</td>
          </tr>";
}
?>
</table>

</body>
</html>
