<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="assets/images/icon_auth.png" alt="logo" style="width: 154px; margin-bottom: -20px;">
                        </div>
                        <h4 class="font-weight-light text-dark">Masuk</h4>
                        <h6 class="font-weight-light text-dark">Silahkan masuk menggunakan akun yang telah terdaftar.</h6>
                        <form class="pt-3" method="POST" action="proses-masuk" id="login" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="number" class="form-control form-control-lg" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" onKeyPress="if(this.value.length==16) return false;" onpaste="return false" oncut="return false" oncopy="return false" ondrag="return false" ondrop="return false" onwheel="this.blur()" autocomplete="off" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Nama Lengkap" readonly>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" id="btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Harap Tunggu">Masuk</button>
                            </div>
                        </form>
                        <div class="text-center mt-4 font-weight-light">
                            Belum mempunyai akun ? <a href="daftar" class="text-info">Daftar Sekarang</a>
                        </div>
                        <hr>
                        <div class="text-center font-weight-light" style="margin-bottom: -20px;">
                            <a href="https://github.com/fatkhur03/" style="color: black;" target="_blank"><i class="fa fa-github" style="font-size: 32px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>