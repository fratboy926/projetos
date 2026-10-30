<<?php
// debug.php

// 1. A chave secreta
$secret_key = 'deephat-2026';

// 2. Verificar se a chave foi fornecida
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    die('Acesso não autorizado. Forneça a chave secreta.');
}

// 3. Ler o arquivo de captura na RAIZ do projeto
$log_file = __DIR__ . '/captures.txt';

if (file_exists($log_file)) {
    $captures = file_get_contents($log_file);
    echo "<pre style='background: #f0f0f0; padding: 20px; border-radius: 8px; font-family: monospace;'>" . $captures . "</pre>";
} else {
    echo "<pre>Nenhuma captura ainda.</pre>";
}
?>
