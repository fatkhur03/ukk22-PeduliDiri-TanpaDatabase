<?php
session_start();

$nik = $_POST['nik'];

$db = file("../database/config.txt", FILE_IGNORE_NEW_LINES);

foreach ($db as $data) {
    $pd = explode("|", $data);

    if ($nik == $pd['0']) {
        $cek = true;
        $nama = $pd['1'];
    }
}

if (isset($cek)) {
    $response = [
        'status'    => 'success',
        'nama'      => $nama
    ];

    echo json_encode($response);
} else {
    $response = [
        'status'   => 'failed',
        'msg'      => 'NIK yang kamu masukan tidak terdaftar'
    ];

    echo json_encode($response);
}
