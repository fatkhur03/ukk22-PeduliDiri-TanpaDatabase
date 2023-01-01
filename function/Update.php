<?php
session_start();

$nik = $_SESSION['nik'];

$id_catatan = $_POST['id_catatan'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$lokasi = $_POST['lokasi'];
$suhu = $_POST['suhu'];

$format = $id_catatan . "|" . $nik . "|" . $tanggal . "|" . $jam . "|" . $lokasi . "|" . $suhu;

$file = "../database/catatan_perjalanan.txt";

$db = file($file, FILE_IGNORE_NEW_LINES);
$files = file_get_contents($file);

foreach ($db as $value) {
    $pd = explode("|", $value);
    if ($id_catatan == $pd['0']) {
        $dataOld = ["$pd[0]|$pd[1]|$pd[2]|$pd[3]|$pd[4]|$pd[5]"];
        $dataNew = ["$format"];

        $replace = str_replace($dataOld, $dataNew, $files);

        file_put_contents($file, $replace);
    }
}

$response = [
    'status'    => 'success',
    'msg'       => 'Catatan perjalanan berhasil di ubah',
    'redirect'  => 'catatan-perjalanan'
];

echo json_encode($response);
