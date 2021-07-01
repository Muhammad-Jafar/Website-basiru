<div class="container">

    <div class="row justify-content-center mt-5 mr-3">
        <div class="col-md-5">


            <div class="card shadow mb-5">
                <div class="card-header">
                    Form Edit Data Program
                </div>
                <div class="card-body">

                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?= $program['id']; ?>">

                        <div class="form-group">
                            <label for="judul">Nama Program</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $program['judul']; ?>">
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="mulai">Mulai</label>
                            <input type="text" class="form-control" id="mulai" name="mulai" value="<?= $program['mulai']; ?>">
                            <small class="form-text text-danger"><?= form_error('mulai'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="text" class="form-control" id="deadline" name="deadline" value="<?= $program['deadline']; ?>">
                            <small class="form-text text-danger"><?= form_error('deadline'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">

                                <?php foreach ($status as $s) : ?>
                                    <?php if ($s == $program['status']) : ?>
                                        <option value="<?= $s; ?>" selected><?= $s; ?></option>

                                    <?php else : ?>
                                        <option value="<?= $s; ?>"><?= $s; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
                        <a href="<?= base_url('program/index/'); ?>" class="btn btn-danger">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>