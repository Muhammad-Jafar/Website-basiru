<div class="container">

    <div class="row justify-content-center mt-5 mr-3">
        <div class="col-md-5">


            <div class="card shadow mb-5">
                <div class="card-header">
                    Form Edit Data Sub Menu
                </div>
                <div class="card-body">

                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?= $sub['id']; ?>">

                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $sub['title']; ?>">
                            <small class="form-text text-danger"><?= form_error('title'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="menu_id">Menu</label>
                            <input type="text" class="form-control" id="menu_id" name="menu_id" value="<?= $sub['menu_id']; ?>">
                            <small class="form-text text-danger"><?= form_error('menu_id'); ?></small>
                        </div>


                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" id="url" name="url" value="<?= $sub['url']; ?>">
                            <small class="form-text text-danger"><?= form_error('url'); ?></small>
                        </div>


                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $sub['icon']; ?>">
                            <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                        </div>


                        <div class="form-group">
                            <label for="is_active">Is Active</label>
                            <input type="text" class="form-control" id="is_active" name="is_active" value="<?= $sub['is_active']; ?>">
                            <small class="form-text text-danger"><?= form_error('is_active'); ?></small>
                        </div>



                        <button type="submit" name="edit_menu" class="btn btn-primary float-right">Edit Data</button>
                        <a href="<?= base_url('sub/submenu/'); ?>" class="btn btn-danger">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>