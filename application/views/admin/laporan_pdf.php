<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pdf</title>
</head>

<body>
    <h1 style="text-align: center;">Laporan Data Surat</h1>
    <table border="1" cellspacing="0" cellpadding="1" width="100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>NO_AWB</th>
                <th>CONSIGNEE</th>
                <th>TANGGAL</th>
                <th>ALAMAT</th>
                <th>TTD</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($surat as $sr) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $sr->no_awb ?></td>
                    <td><?php echo $sr->consignee ?></td>
                    <td><?php echo $sr->tgl ?></td>
                    <td><?php echo $sr->alamat ?></td>
                    <td></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>