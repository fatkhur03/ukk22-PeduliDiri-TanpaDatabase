<div class="text-right mb-2" style="margin-top: -16px;">
    <a href="print" target="_blank" class="btn btn-warning btn-sm text-white"><i class="fa fa-print"></i> Cetak Laporan</a>
</div>
<table class="table table-striped table-bordered" style="width: 100%;" id="dataTravel">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Lokasi</th>
            <th>Suhu</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();

        $nik = $_SESSION['nik'];
        $no = 1;

        $file = "../../database/catatan_perjalanan.txt";
        $db = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($db as $value) {
            $pd = explode("|", $value);
            if ($pd['1'] == $nik) {
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pd['2']; ?></td>
                    <td><?= $pd['3']; ?></td>
                    <td><?= $pd['4']; ?></td>
                    <td><?= $pd['5']; ?> °C</td>
                    <td>
                        <?php
                        if ($pd['5'] >= '36.1' && $pd['5'] <= '37.2') {
                            echo "<span class='text-info font-weight-bold'>Suhu tubuh normal</span>";
                        } else if ($pd['5'] >= '37.3' && $pd['5'] <= '38') {
                            echo "<span class='text-danger font-weight-bold'>Suhu tubuh tidak normal</span>";
                        } else if ($pd['5'] > '38') {
                            echo "<span class='text-danger font-weight-bold'>Suhu tubuh tinggi, segera periksakan diri ke dokter</span>";
                        } else {
                            echo "<span class='text-danger font-weight-bold'>Suhu tubuh rendah</span>";
                        }
                        ?></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#editModal" data-id="<?= $pd['0'] ?>" class="btn btn-info btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="hapus-catatan/<?= $pd['0'] ?>" class="btn btn-danger btn-sm hapus-catatan">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<!-- Modal Form Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-dark" id="exampleModalLabel">Edit Catatan Perjalanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form"></div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#dataTravel').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#editModal').on('show.bs.modal', function(e) {

            document.title = "PeduliDiri - Edit Catatan Perjalanan";

            var id = $(e.relatedTarget).data('id');

            $.ajax({
                type: 'POST',
                url: 'form-update',
                data: 'id=' + id,
                success: function(data) {
                    $('.form').html(data);
                }
            });
        });

        $('#editModal').on('hidden.bs.modal', function(e) {
            document.title = "PeduliDiri - Catatan Perjalanan";
        });
    });
</script>

<script src="assets/js/delete.js"></script>