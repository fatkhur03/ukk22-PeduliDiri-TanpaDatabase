<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="assets/images/icon_auth.png" alt="logo" style="width: 154px; margin-bottom: -20px;">
                        </div>
                        <h4 class="font-weight-light text-dark">Pendaftaran</h4>
                        <h6 class="font-weight-light text-dark">Silahkan lakukan pendaftaran untuk melanjutkan menggunakan Aplikasi ini.</h6>
                        <form class="pt-3" action="proses-daftar" method="POST" enctype="multipart/form-data" id="register">
                            <div class="form-group">
                                <input type="number" class="form-control form-control-lg" name="nik" id="nikreg" placeholder="Nomor Induk Kependudukan" onKeyPress="if(this.value.length==16) return false;" onpaste="return false" oncut="return false" oncopy="return false" ondrag="return false" ondrop="return false" onwheel="this.blur()" autocomplete="off" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="nama" id="namareg" placeholder="Nama Lengkap" autocomplete="off" required>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" id="btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Harap Tunggu">Daftar</button>
                            </div>
                        </form>
                        <div class="text-center mt-4 font-weight-light">
                            Sudah mempunyai akun ? <a href="masuk" class="text-info">Masuk Sekarang</a>
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