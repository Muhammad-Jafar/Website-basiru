<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png/jpg/gif" href="<?= base_url('/assets/img/favicon/logo2.jpg'); ?>">
    <title>Laporan Donatur</title>
</head>

<body>
    <tr>
        <h3 style="text-align: center;">LAPORAN DATA DONATUR</h3>
    </tr>
    <!--Skript untuk tampilan tabel -->
    <table class="table table-bordered table-hover" style="text-align: center;" style="margin-left: auto; margin-right: auto">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Program</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Donasi</th>
                <th scope="col">Bank</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($donatur as $d) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['program']; ?></td>
                    <td><?= $d['no_telp']; ?></td>
                    <td><?= 'Rp.' . number_format($d['nominal'], 2, ',', '.'); ?></td>
                    <td><?= $d['bank']; ?></td>

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