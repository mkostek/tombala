<?php
session_start();

$dataFile = "data.json";

// Dosya yoksa oluştur
if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode(["numbers" => []]));
}

$data = json_decode(file_get_contents($dataFile), true);

// Yeni sayı çekme isteği
if (isset($_GET['cek'])) {

    if (count($data['numbers']) >= 90) {
        echo json_encode(["status" => "finished"]);
        exit;
    }

    do {
        $sayi = rand(1, 90);
    } while (in_array($sayi, $data['numbers']));

    $data['numbers'][] = $sayi;
    file_put_contents($dataFile, json_encode($data));

    echo json_encode(["status" => "ok", "new" => $sayi]);
    exit;
}

// Listeleme isteği
echo json_encode($data);
