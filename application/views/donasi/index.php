<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>

<div class="row">
    <div class="col-lg-10 ml-4">

        <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="fa fa-plus mr-2"></i>Tambah Donasi</a>

        <a href="<?= base_url('Donasi/print'); ?>" class="btn btn-primary mb-3"><i class="fa fa-print mr-2"></i>Cetak Laporan</a>


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

        <?php if (empty($donasi)) : ?>
            <div class="alert alert-danger" role="alert">
                Data yang anda cari tidak ditemukan...
            </div>
        <?php endif; ?>

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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($donasi as $d) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $d['program_id']; ?></td>
                        <td><?= $d['nama']; ?></td>
                        <td><?= 'Rp.' . number_format($d['jumlah'], 2, ',', '.'); ?></td>
                        <td><?= $d['bank']; ?></td>
                        <td><?= $d['tgl']; ?></td>
                        <td>
                            <!-- Koding Untuk Edit-->
                            <a href="<?= base_url('donasi/edit/' . $d['id']); ?> 
                                " class="badge badge-success">Edit</a>


                            <!-- Koding Untuk Delete-->
                            <a href="<?= base_url('donasi/hapus/' . $d['id']); ?> 
                                " class="badge badge-danger" onclick="return confirm 
                                    ('Apakah anda yakin ingin menghapus data tersebut?'); ">Hapus</a>

                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>


</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Donasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('donasi'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="program_id" name="program_id" placeholder="Nama Program">
                    </div>


                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>

                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>

                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank">
                    </div>

                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="tgl" name="tgl" placeholder="Tanggal">
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