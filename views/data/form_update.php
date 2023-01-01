<?php
session_start();

$nik = $_SESSION['nik'];
$id_catatan = $_POST['id'];

$file = "../../database/catatan_perjalanan.txt";
$db = file($file, FILE_IGNORE_NEW_LINES);

foreach ($db as $value) {
    // Pecah data 
    $pd = explode("|", $value);
    if ($pd['0'] == $id_catatan) {
        if ($pd['1'] == $nik) {
?>
            <form class="forms-sample" method="POST" action="proses-edit-catatan" enctype="multipart/form-data" id="edit-catatan">
                <input type="hidden" name="id_catatan" value="<?= $pd['0'] ?>">
                <div class="form-group">
                    <label for="datepicker">Tanggal</label>
                    <input class="form-control" id="datepicker" name="tanggal" value="<?= $pd['2'] ?>" autocomplete="off" style="background-color: #ffffff; cursor: pointer;" readonly>
                </div>
                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input class="form-control" id="jam" name="jam" value="<?= $pd['3'] ?>" autocomplete="off" style="background-color: #ffffff; cursor: pointer; font-weight: 400; font-family: Karla, sans-serif;" readonly>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $pd['4'] ?>" placeholder="Masukan Lokasi" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="suhu">Suhu</label>
                    <input type="number" class="form-control" id="suhu" name="suhu" step="any" min="30" max="40" value="<?= $pd['5'] ?>" onKeyPress="if(this.value.length==4) return false;" onpaste="return false" oncut="return false" oncopy="return false" ondrag="return false" ondrop="return false" onwheel="this.blur()" placeholder="Masukan Suhu" autocomplete="off" required>
                </div>
                <hr>
                <button type="submit" class="btn btn-info btn-block" id="btn">Simpan Perubahan</button>
            </form>
<?php
        }
    }
}
?>

<script>
    $("#datepicker").datepicker({
        inline: true,
        dateFormat: "dd-mm-yy",
        minDate: "-30d",
        maxDate: new Date()
    });
</script>

<script>
    $('#jam').timepicker();
</script>

<script src="assets/js/update.js"></script>