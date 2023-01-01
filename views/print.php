<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data</title>

    <style>
        @media screen {

            #data td,
            #data th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #data {
                border-collapse: collapse;
                width: 100%;
            }

            #data tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            #data th {
                background-color: #4e8ed9;
                color: white;
                font-weight: 400;
            }

            .text-center {
                text-align: center;
            }

            .footer {
                display: none;
            }
        }

        @media print {

            #data td,
            #data th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #data {
                border-collapse: collapse;
                width: 100%;
            }

            #data tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            #data th {
                background-color: #4e8ed9;
                color: white;
                font-weight: 400;
            }

            .text-center {
                text-align: center;
            }

            .title {
                margin-top: -10px;
            }

            .footer {
                position: fixed;
                bottom: 0;
            }
        }
    </style>
</head>

<body>
    <h2 class="text-center title">Laporan Perjalanan</h2>
    <table id="data">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Lokasi</th>
                <th>Suhu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();

            $nik = $_SESSION['nik'];
            $no = 1;

            $file = "../database/catatan_perjalanan.txt";
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

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <!-- footer -->
    <small class="footer"><i>*Data perjalanan ini diproses dan dicetak oleh Komputer.</i></small>
    <script>
        window.print();

        window.onafterprint = function() {
            window.close();
            console.log("Print completed..");
        }
    </script>
</body>

</html>