<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="alert alert-light font-weight-bold text-dark">
                <i class="fa fa-info"></i> Data Lokasi yang sering dikunjungi oleh Anda
            </div>
            <table class="table table-bordered table-striped" id="dataTravelFV">
                <thead>
                    <tr>
                        <th>Lokasi</th>
                        <th>Terakhir Kunjungan</th>
                        <th>Total Kunjungan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    $nik = $_SESSION['nik'];

                    $file = "../../database/catatan_perjalanan.txt";
                    $db = file($file, FILE_IGNORE_NEW_LINES);
                    $no = 1;
                    foreach ($db as $value) {
                        $pd = explode("|", $value);
                        if ($pd['1'] == $nik) {
                            $data[] = $pd['4'];
                        }
                    }
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

                    function search($data, $data2)
                    {
                        for ($K = 0; $K < count($data2); $K++) {
                            // echo $data2[$K] . " => " . searchData($data, $data2[$K]) . "<br/>";
                            $key['1'] = $data2[$K];
                            $key['2'] = searchData($data, $data2[$K]);
                            if ($key['2'] >= 2) {
                                $lokasi = $data2[$K];
                                $kunjungan = searchData($data, $data2[$K]);
                                showData($lokasi, $kunjungan);
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
                    function showData($lokasi, $kunjungan)
                    {
                        $nik = $_SESSION['nik'];

                        $file = "../../database/catatan_perjalanan.txt";
                        $db = file($file, FILE_IGNORE_NEW_LINES);
                        foreach ($db as $value) {
                            $pd = explode("|", $value);
                            if ($pd['1'] == $nik) {
                                if ($pd['4'] == $lokasi) {
                                    $tanggal = $pd['2'];
                                }
                            }
                        }
                    ?>
                        <tr>
                            <td><?= $lokasi; ?></td>
                            <td><?= $tanggal; ?></td>
                            <td><?= $kunjungan . "x"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTravelFV').DataTable();
    });
</script>