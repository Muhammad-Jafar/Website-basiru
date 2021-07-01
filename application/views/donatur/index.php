<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>

<div class="row">
    <div class="col-lg ml-2">

        <?= $this->session->flashdata('message'); ?>

        <!-- <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newMenuModal">Donatur</a> -->

        <a href="<?= base_url('Donatur/print'); ?>" class="btn btn-primary mb-3"><i class="fa fa-print mr-2"></i>Cetak Laporan</a>

        <!-- UNTUK SKRIP PENCARIAN!-->
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="" method="post">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Cari</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <?php if (empty($donatur)) : ?>
            <div class="alert alert-danger" role="alert">
                Data yang anda cari tidak ditemukan...
            </div>
        <?php endif; ?>

        <!--Skript untuk tampilan tabel -->
        <table class="table table-bordered table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nama Program</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Donasi</th>
                    <th scope="col">Bank</th>
                    <th scope="col">Upload</th>
                    <th scope="col">Action</th>
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
                        <td><?= $d['image']; ?></td>
                        <td>
                            <!-- Koding Untuk Edit
                            <a href="<?= base_url($d['image']); ?> 
                                " class="badge badge-primary" download>Unduh</a> -->


                            <!-- Koding Untuk Edit-->
                            <a href="<?= base_url('donatur/edit/' . $d['id']); ?> 
                                " class="badge badge-success">Edit</a>


                            <!-- Koding Untuk Delete-->
                            <a href="<?= base_url('donatur/hapus/' . $d['id']); ?> 
                                " class="badge badge-danger" onclick="return confirm 
                                    ('Apakah anda yakin ingin menghapus data tersebut?'); ">Hapus</a>

                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" style="text-align: center;"> Jumlah Donasi</td>
                    <td><?= 'Rp.' . number_format($sum->nominal, 2, ',', '.'); ?></td>
                    <td colspan="3"></td>

                </tr>
            </tbody>
        </table>

    </div>

</div>


<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Donatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('donatur'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group pb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>

                    <div class="form-group pb-3">
                        <input type="text" class="form-control" id="program" name="program" placeholder="Nama Program">
                    </div>

                    <div class="form-group pb-3">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submmit" class="btn btn-primary">Tambah</button>
                </div>
            </form>

        </div>
    </div>
</div>