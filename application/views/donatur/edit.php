<div class="container">

    <div class="row justify-content-center mt-5 mr-3">
        <div class="col-md-5">


            <div class="card shadow mb-5">
                <div class="card-header">
                    Form Edit Data Donatur
                </div>
                <div class="card-body">

                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?= $donatur['id']; ?>">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $donatur['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="program">Nama Program</label>
                            <input type="text" class="form-control" id="program" name="program" value="<?= $donatur['program']; ?>">
                            <small class="form-text text-danger"><?= form_error('program'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $donatur['no_telp']; ?>">
                            <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="nominal">Donasi</label>
                            <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $donatur['nominal']; ?>">
                            <small class="form-text text-danger"><?= form_error('nominal'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="bank">Transfer Bank</label>
                            <select class="form-control" id="bank" name="bank">
                                <option value="BRI : 0093-01-049032-50-6 ">BRI : 0093-01-049032-50-6 </option>
                                <option value="BNI : 0010-01-123456-00-8 ">BNI : 0010-01-123456-00-8 </option>
                            </select>
                        </div>

                        <!-- <div class="form-group">
                            <label>Upload Bukti Transaksi</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div> -->


                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
                        <a href="<?= base_url('donatur/index/'); ?>" class="btn btn-danger">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>