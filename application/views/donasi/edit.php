<div class="container">

    <div class="row justify-content-center mt-5 mr-3">
        <div class="col-md-5">


            <div class="card shadow mb-5">
                <div class="card-header">
                    Form Edit Data Donasi
                </div>
                <div class="card-body">

                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?= $donasi['id']; ?>">

                        <div class="form-group">
                            <label for="program_id">Nama Program</label>
                            <input type="text" class="form-control" id="program_id" name="program_id" value="<?= $donasi['program_id']; ?>">
                            <small class="form-text text-danger"><?= form_error('program_id'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $donasi['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Nominal</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $donasi['jumlah']; ?>">
                            <small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="bank">Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" value="<?= $donasi['bank']; ?>">
                            <small class="form-text text-danger"><?= form_error('bank'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input type="text" class="form-control" id="tgl" name="tgl" value="<?= $donasi['tgl']; ?>">
                            <small class="form-text text-danger"><?= form_error('tgl'); ?></small>
                        </div>


                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
                        <a href="<?= base_url('donasi/index/'); ?>" class="btn btn-danger">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>