<?php
session_start();

$id_catatan = $_GET['id'];
$nik = $_SESSION['nik'];

$file = "../database/catatan_perjalanan.txt";

$db = file($file, FILE_IGNORE_NEW_LINES);
$no = 0;
foreach ($db as $value) {
    $pd = explode("|", $value);
    $no++;
    if ($id_catatan == $pd['0']) {
        if ($nik == $pd['1']) {
            $line = $no - 1;
        }
    }
}

$file_db = file($file);
unset($file_db[$line]);

file_put_contents($file, implode("", $file_db));

$response = [
    'status'     => 'success',
    'msg'        => 'Catatan perjalanan berhasil di hapus',
    'redirect'   => 'catatan-perjalanan',
];

echo json_encode($response);
