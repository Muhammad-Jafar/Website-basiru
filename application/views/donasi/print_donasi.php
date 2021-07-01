<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png/jpg/gif" href="<?= base_url('/assets/img/favicon/logo2.jpg'); ?>">
    <title>Laporan Donasi</title>
</head>

<body>
    <tr>
        <h3 style="text-align: center;">LAPORAN DATA DONASI</h3>
    </tr>
    <!--Skript untuk tampilan tabel -->
    <table class="table table-bordered table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Program</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Bank</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($donasi as $d) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $d['program_id']; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['jumlah']; ?></td>
                    <td><?= $d['bank']; ?></td>
                    <td><?= $d['tgl']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>