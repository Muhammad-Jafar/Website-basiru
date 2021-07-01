<div class="container">

    <div class="row justify-content-center mt-5 mr-3">
        <div class="col-md-5">


            <div class="card shadow mb-5">
                <div class="card-header">
                    Form Edit Data Menu
                </div>
                <div class="card-body">

                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">

                        <div class="form-group">
                            <label for="menu">Menu</label>
                            <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">
                            <small class="form-text text-danger"><?= form_error('title'); ?></small>
                        </div>

                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
                        <a href="<?= base_url(); ?>menu" class="btn btn-danger">Kembali</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>