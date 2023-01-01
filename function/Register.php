<?php

sleep('3');

$nik = $_POST['nik'];
$nama = $_POST['nama'];

$db = file("../database/config.txt", FILE_IGNORE_NEW_LINES);

foreach ($db as $data) {
    $pd = explode("|", $data);
    if ($nik == $pd['0']) {
        $cek = true;
    }
}

if (isset($cek)) {
    $response = [
        'status'    => 'failed',
        'msg'       => 'NIK yang anda gunakan telah terdaftar',
    ];

    echo json_encode($response);
} else {
    $data = $nik . "|" . $nama . "\n";
    $db = fopen("../database/config.txt", 'a');

    fwrite($db, $data);
    fclose($db);

    $response = [
        'status'    => 'success',
        'msg'       => 'Pendaftaran berhasil, Silahkan login'
    ];

    echo json_encode($response);
}
