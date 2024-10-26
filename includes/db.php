<?php
$host = 'localhost';   // Servidor do banco de dados
$db = 'project_phppuro';   // Nome do banco de dados (substitua pelo nome escolhido)
$user = 'root';        // Usuário do banco (geralmente "root" no XAMPP e WAMP)
$pass = '';            // Senha (em XAMPP e WAMP, geralmente é vazia)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>