<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>

<div class="row">
    <div class="col-lg-10 ml-4">

        <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="fa fa-plus mr-2"></i>Tambah Program Baru</a>


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

        <?php if (empty($program)) : ?>
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
                    <th scope="col">Mulai</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($program as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p['judul']; ?></td>
                        <td><?= $p['mulai']; ?></td>
                        <td><?= $p['deadline']; ?></td>
                        <td><?= $p['status']; ?></td>
                        <td>
                            <!-- Koding Untuk Edit-->
                            <a href="<?= base_url('program/edit/' . $p['id']); ?> 
                                " class="badge badge-success">Edit</a>


                            <!-- Koding Untuk Delete-->
                            <a href="<?= base_url('program/hapus/' . $p['id']); ?> 
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
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Program Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('program'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama Program">
                    </div>

                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="mulai" name="mulai" placeholder="Mulai">
                    </div>

                    <div class="form-group mb-2">
                        <input type="text" class="form-control" id="deadline" name="deadline" placeholder="Deadline">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Selesai">Selesai</option>
                            <option value="Sedang Berjalan">Sedang Berjalan</option>
                            <option value="Belum Berjalan">Belum Berjalan</option>
                        </select>
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