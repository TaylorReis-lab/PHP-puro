<?php
session_start();
require '../includes/db.php';
require '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isValidLogin($email, $password, $pdo)) {
        $_SESSION['user'] = $email; // Salva o usuário logado na sessão
        header('Location: private.php');
        exit();
    } else {
        echo "Email ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="password" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
