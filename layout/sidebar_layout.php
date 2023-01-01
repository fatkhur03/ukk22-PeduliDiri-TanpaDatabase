<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="assets/images/user.jpg">
        </div>
        <div class="user-name" style="text-transform: uppercase;">
            <?= $_SESSION['nama']; ?>
        </div>
        <div class="user-designation">
            <?= $_SESSION['nik']; ?>
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="home">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link" href="catatan-perjalanan">
                <i class="fa fa-book menu-icon"></i>
                <span class="menu-title">Catatan Perjalanan</span>
            </a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link" href="tambah-catatan">
                <i class="fa fa-plus-square menu-icon"></i>
                <span class="menu-title">Tambah Catatan</span>
            </a>
        </li>
        <li class="nav-item mt-4">
            <a class="nav-link" href="keluar" id="logout">
                <i class="fa fa-sign-out menu-icon"></i>
                <span class="menu-title">Keluar</span>
            </a>
        </li>
    </ul>
</nav>