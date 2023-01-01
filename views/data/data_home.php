<div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
    <div class="row flex-grow">
        <?php
        session_start();

        $nik = $_SESSION['nik'];
        $no = 1;

        $file = "../../database/catatan_perjalanan.txt";
        $db = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($db as $value) {
            $pd = explode("|", $value);
            if ($pd['1'] == $nik) {
                $totalPerjalanan = $no++;
            }
        }
        ?>
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title animated fadeInDown mb-4">Total Perjalanan Anda</h4>
                    <h4 class="text-dark font-weight-bold mb-2 animated fadeInUp">
                        <?php
                        if (isset($totalPerjalanan)) {
                            echo $totalPerjalanan;
                        } else {
                            echo "0";
                        }
                        ?>
                    </h4>
                </div>
            </div>
        </div>
        <?php

        $nik = $_SESSION['nik'];
        $no = 1;

        $file = "../../database/catatan_perjalanan.txt";
        $db = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($db as $value) {
            $pd = explode("|", $value);
            if ($pd['1'] == $nik) {
                if ($pd['2'] == date('d-m-Y')) {
                    $totalPerjalananToday = $no++;
                }
            }
        }
        ?>
        <div class="col-sm-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title animated fadeInDown mb-4">Perjalanan Hari Ini</h4>
                    <h4 class="text-dark font-weight-bold mb-2 animated fadeInUp">
                        <?php
                        if (isset($totalPerjalananToday)) {
                            echo $totalPerjalananToday;
                        } else {
                            echo "0";
                        }
                        ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-9 d-flex grid-margin stretch-card">
    <div class="card">
        <div class="card-body animated fadeIn" style="background-image: url('assets/images/travel.jpg'); background-size: cover; border-radius: 10px; background-position: center;">
        </div>
    </div>
</div>