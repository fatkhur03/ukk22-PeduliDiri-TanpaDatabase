<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 mb-4 mb-xl-0">
            <h4 class="font-weight-bold text-dark">Edit Catatan Perjalanan</h4>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-left">
                        <a onclick="window.history.go(-1); return false;" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php

                    $nik = $_SESSION['nik'];
                    $id_catatan = $_GET['id'];

                    $file = "database/catatan_perjalanan.txt";
                    $db = file($file, FILE_IGNORE_NEW_LINES);

                    foreach ($db as $value) {
                        // Pecah data 
                        $pd = explode("|", $value);
                        if ($pd['0'] == $id_catatan) {
                            if ($pd['1'] == $nik) {
                    ?>
                                <form class="forms-sample" method="POST" action="http://localhost/peduli-diri-native/proses-edit-catatan" enctype="multipart/form-data" id="edit-catatan">
                                    <input type="hidden" name="id_catatan" value="<?= $pd['0'] ?>">
                                    <div class="form-group">
                                        <label for="datepicker">Tanggal</label>
                                        <input class="form-control" id="datepicker" name="tanggal" value="<?= $pd['2'] ?>" autocomplete="off" style="background-color: #ffffff; cursor: default;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="jam">Jam</label>
                                        <input type="time" class="form-control" id="jam" name="jam" value="<?= $pd['3'] ?>" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $pd['4'] ?>" placeholder="Masukan Lokasi" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="suhu">Suhu</label>
                                        <input type="number" class="form-control" id="suhu" name="suhu" step="any" value="<?= $pd['5'] ?>" placeholder="Masukan Suhu" autocomplete="off" required>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block" id="btn">Simpan Perubahan</button>
                                </form>
                    <?php
                            } else {
                                echo "<script>location.href='../catatan-perjalanan';</script>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>