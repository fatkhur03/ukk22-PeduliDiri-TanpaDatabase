<?php
session_start();

if (isset($_SESSION['IsLogged'])) {
    header("location: home");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PeduliDiri</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendors/toastr/build/toastr.min.css">
    <link rel="shortcut icon" href="assets/images/icon_app.png" />
</head>

<body>
    <?php
    switch ($_GET['page']) {
        case 'masuk':
            include "login.php";
            break;

        case 'daftar':
            include "register.php";
            break;

        default:
            header("location: 404.html");
            break;
    }
    ?>

    <script src="assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/vendors/toastr/build/toastr.min.js"></script>

    <?php
    if ($_GET['page'] == 'masuk') {
    ?>
        <script src="assets/js/login.js"></script>
    <?php
    } else if ($_GET['page'] == 'daftar') {
    ?>
        <script src="assets/js/register.js"></script>
    <?php
    }
    ?>

</body>

</html>