<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
    exit('Não autorizado');
}

// Caminho do arquivo de favoritos por usuário
$usuario = preg_replace('/[^a-zA-Z0-9_\-]/', '', $_SESSION['usuario']);
$favFile = __DIR__ . "/favoritos_$usuario.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['favoritos']) || !is_array($data['favoritos'])) {
        http_response_code(400);
        exit('Formato inválido');
    }
    file_put_contents($favFile, json_encode($data['favoritos'], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
    echo 'ok';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($favFile)) {
        header('Content-Type: application/json');
        echo file_get_contents($favFile);
    } else {
        echo '[]';
    }
    exit;
}

http_response_code(405);
