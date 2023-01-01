<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 mb-4 mb-xl-0">
            <h4 class="font-weight-bold text-dark">Tambah Catatan Perjalanan</h4>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info">
                        <p class="font-weight-bold" style="font-size: 18px;">Informasi</p>
                        <ol>
                            <li>Anda hanya dapat memilih tanggal perjalanan 30 hari ke belakang dan tidak dapat memilih tanggal lebih dari tanggal hari ini</li>
                            <li>Tidak dapat menambahkan kembali data perjalanan yang sudah anda tambahkan sebelumnya</li>
                            <li>Format jam terbagi menjadi 2 yaitu <b>AM</b> dan <b>PM</b>. <b>AM</b> untuk 00:00 - 11:59, <b>PM</b> untuk 12:00 - 23:59</li>
                            <li>Suhu tubuh harus berupa Celcius (°C)</li>
                        </ol>
                    </div>
                    <form class="forms-sample" method="POST" action="proses-tambah-catatan" enctype="multipart/form-data" id="tambah-catatan">
                        <div class="form-group">
                            <label for="datepicker">Tanggal</label>
                            <input class="form-control" id="datepicker" name="tanggal" autocomplete="off" style="background-color: #ffffff; cursor: pointer;" placeholder="Masukan Tanggal" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input class="form-control" id="jam" name="jam" autocomplete=" off" style="background-color: #ffffff; cursor: pointer; font-weight: 400; font-family: Karla, sans-serif;" placeholder="Masukan Jam" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukan Lokasi" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="suhu">Suhu</label>
                            <input type="number" class="form-control" id="suhu" name="suhu" min="30" max="40" step="any" onKeyPress="if(this.value.length==4) return false;" onpaste="return false" oncut="return false" oncopy="return false" ondrag="return false" ondrop="return false" onwheel="this.blur()" placeholder="Masukan Suhu" autocomplete="off" required>
                        </div>
                        <button type="submit" class="btn btn-info btn-block" id="btn">Simpan Catatan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>