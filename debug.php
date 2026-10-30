<?php
// debug.php

// 1. Verificar se o usuário está autorizado (opcional)
// if ($_GET['key'] !== 'sua_chave_secreta') {
//     die('Acesso não autorizado.');
// }

// 2. Ler o arquivo de captura
$log_file = __DIR__ . '/logs/captures.txt';

if (file_exists($log_file)) {
    $captures = file_get_contents($log_file);
    echo "<pre>";
    echo $captures;
    echo "</pre>";
} else {
    echo "Nenhuma captura ainda.";
}
?>
