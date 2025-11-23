<?php

$data = json_decode(file_get_contents("data.json"), true);
$cekilenler = $data['numbers'];

$oyuncuId = $_GET['id'];
$kart = json_decode(file_get_contents("kartlar/$oyuncuId.json"), true);

$eslesen = array_values(array_intersect($kart, $cekilenler));

echo json_encode([
    "kart"     => $kart,
    "cekilen"  => $cekilenler,
    "eslesen"  => $eslesen
]);
