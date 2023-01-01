<?php
session_start();

sleep('3');

$nik = $_POST['nik'];
$nama = $_POST['nama'];

$data = $nik . "|" . $nama;

$db = file("../database/config.txt", FILE_IGNORE_NEW_LINES);

if (in_array($data, $db)) {
    $_SESSION['nik']        = $nik;
    $_SESSION['nama']       = $nama;
    $_SESSION['IsLogged']   = true;

    $response = [
        'status'    => 'success',
        'msg'       => 'Login Berhasil!'
    ];

    echo json_encode($response);
} else {
    $response = [
        'status'    => 'failed',
        'msg'       => 'Login Gagal!'
    ];

    echo json_encode($response);
}
