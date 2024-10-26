<?php
require '../includes/db.php';
require '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $password = md5($_POST['password']);
    $title = getApiTitle(); // Obtém o título da API

    $stmt = $pdo->prepare("INSERT INTO users (name_user, email_user, password_user, title_user, code_user) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $title, $code]);

    echo " Usuário cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form method="POST" action="register.php">
        Nome: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Código Único: <input type="text" name="code" required><br>
        Senha: <input type="password" name="password" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
