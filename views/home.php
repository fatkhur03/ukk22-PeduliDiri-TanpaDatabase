<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 mb-4 mb-xl-0">
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $jam = date('H:i');

            if ($jam > 00.00 && $jam < 11.01) {
                $salam = "Selamat Pagi!";
            } else if ($jam > 11.00 && $jam < 14.01) {
                $salam = "Selamat Siang!";
            } else if ($jam > 14.00 && $jam < 18.01) {
                $salam = "Selamat Sore!";
            } else {
                $salam = "Selamat Malam!";
            }
            ?>
            <h4 class="font-weight-bold text-dark"><?= $salam; ?></h4>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="alert alert-info">
                <i class="fa fa-bullhorn"></i>
                Selamat datang, <b><?= $_SESSION['nama']; ?></b> di Aplikasi PeduliDiri!
            </div>
        </div>
    </div>
    <div class="row" id="loadDataHome">
        <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
            <div class="row flex-grow">
                <div class="col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Total Perjalanan Anda</h4>
                            <h4 class="text-dark font-weight-bold mb-2">0</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Perjalanan Hari Ini</h4>
                            <h4 class="text-dark font-weight-bold mb-2">0</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 d-flex grid-margin stretch-card">
            <div class="card">
                <div class="card-body" style="border-radius: 10px;">

                </div>
            </div>
        </div>
    </div>

    <?php
    $nik = $_SESSION['nik'];

    $file = "database/catatan_perjalanan.txt";
    $db = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($db as $value) {
        $pd = explode("|", $value);
        if ($pd['1'] == $nik) {
            $data[] = $pd['4'];
        }
    }

    if (!empty($data)) {
        start($data);
    }

    function start($data)
    {
        $jenis[] = null;
        $i = 0;
        for ($j = 0; $j < count($data); $j++) {
            $index = array_search($data[$j], $jenis);
            if ($index == "") {
                $jenis[$i] = $data[$j];
                $i++;
            }
        }

        search($data, $jenis);
    }

    function search($data, $data2)
    {
        for ($K = 0; $K < count($data2); $K++) {
            $key[] = searchData($data, $data2[$K]);
        }

        foreach ($key as $value) {
            if ($value >= 2) {
                showTable(true);
                break;
            }
        }
    }

    function searchData($data, $dupval)
    {
        $nb = 0;
        foreach ($data as $key => $val) {
            if ($val == $dupval) {
                $nb++;
            }
        }
        return $nb;
    }
    ?>

    <?php
    function showTable($val)
    {
        if ($val == true) { ?>
            <div class="row mt-2" id="loadDataVisited">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-light font-weight-bold text-dark">
                                Data Lokasi yang sering dikunjungi oleh Anda
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Lokasi</th>
                                        <th>Terakhir Kunjungan</th>
                                        <th>Total Kunjungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Example Data</td>
                                        <td>Example Data</td>
                                        <td>Example Data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            //
        }
    }
    ?>
</div>