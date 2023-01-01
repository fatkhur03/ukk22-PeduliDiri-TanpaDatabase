<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo text-white" href="home"><img src="assets/images/icon_main.png" alt="logo" style="width: 142px;" /></a>
        <a class="navbar-brand brand-logo-mini text-white" href="home"><img src="assets/images/icon_main_mini.png" alt="logo" style="width: 38px;" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend mr-2">
                        <span class="input-group-text" id="search">
                            <i class="icon-search"></i>
                        </span>
                    </div>
                    <span id="infoText"></span>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-flex mr-4">
                <?php
                function hari()
                {
                    $hari = date('D');

                    switch ($hari) {
                        case 'Sun':
                            $hari_ini = "Minggu";
                            break;

                        case 'Mon':
                            $hari_ini = "Senin";
                            break;

                        case 'Tue':
                            $hari_ini = "Selasa";
                            break;

                        case 'Wed':
                            $hari_ini = "Rabu";
                            break;

                        case 'Thu':
                            $hari_ini = "Kamis";
                            break;

                        case 'Fri':
                            $hari_ini = "Jum'at";
                            break;

                        case 'Sat':
                            $hari_ini = "Sabtu";
                            break;

                        default:
                            $hari_ini = "Hari tidak diketahui";
                            break;
                    }
                    return $hari_ini;
                }

                function tanggal()
                {
                    $tanggal = date('d-m-Y');

                    $bulan = array(
                        1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
                    $pecahkan = explode('-', $tanggal);

                    return $pecahkan[0] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[2];
                }

                echo hari() . ", " . tanggal();
                ?>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>