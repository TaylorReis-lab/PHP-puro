<?php
// Função para buscar o título da API pública
function getApiTitle() {
    $apiUrl = 'https://jsonplaceholder.typicode.com/posts/1';
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);
    return $data['title'];
}

// Função para validar o login
function isValidLogin($email, $password, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email_user = ? AND password_user = ?");
    $stmt->execute([$email, md5($password)]);
    return $stmt->fetch();
}
?>
