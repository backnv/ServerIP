<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$ip    = $_GET['ip']    ?? '0.0.0.0';
$port  = $_GET['port']  ?? '50000';
$id    = $_GET['id']     ?? 'unknown';
$model = urldecode($_GET['model'] ?? 'unknown');
$time  = date('H:i:s');

$file = 'clients.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$data[$id] = [
    'ip'    => $ip,
    'port'  => $port,
    'model' => $model,
    'time'  => $time
];

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

echo json_encode($data);
?>
