<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"></h1>

</div>

<div class="row justify-content-center">

    <!-- Earnings (Monthly) Card Example -->
    <div class=" col-xl-3 col-lg-3 mb-4 ml-3">
        <div class="card shadow md-4">
            <div class="card-body">
                <img src="assets/img/home/gambar.4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title" style="text-align:center">21 Orang Luka dalam Bentrokan Usai Sholat Ju'mat di Masjid Al-Aqsa</h6>
                    <a href="" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#newMenuModal">Donasi</a>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-xl-3 col-lg-3 mb-4 ml-3">
        <div class="card shadow md-4">
            <div class="card-body">
                <img src="assets/img/home/gambar2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title" style="text-align:center">21 Orang Luka dalam Bentrokan Usai Sholat Ju'mat di Masjid Al-Aqsa</h6>
                    <a href="" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#newMenuModal">Donasi</a>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-xl-3 col-lg-3 mb-4 ml-3">
        <div class="card shadow md-4">
            <div class="card-body">
                <img src="assets/img/home/gambar6.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title" style="text-align:center">Gempa M 7,0 di NTB yang Mengguncang Agustus 2018</h6>
                    <a href="" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#newMenuModal">Donasi</a>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-xl-3 col-lg-3 mb-4 ml-3">
        <div class="card shadow md-4">
            <div class="card-body">
                <img src="assets/img/home/gambar1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title" style="text-align:center">Banjir Bandang NTT Awal April 2021 Terparah Dalam 10 Tahun Terakhir</h6>
                    <a href="" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#newMenuModal">Donasi</a>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-xl-3 col-lg-3 mb-4 ml-3">
        <div class="card shadow md-4">
            <div class="card-body">
                <img src="assets/img/home/gambar5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title" style="text-align:center">Banjir Bandang Di NTT Awal April tahun 2021 </h6>
                    <a href="" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#newMenuModal">Donasi</a>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-xl-3 col-lg-3 mb-4 ml-3">
        <div class="card shadow md-4">
            <div class="card-body">
                <img src="assets/img/home/gambar3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title" style="text-align:center">Israel Serang Gaza Lewat Udara dan Laut, Militan Hamas Lakukan Balasan, Pertempuran Kian Memanas</h6>
                    <a href="" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#newMenuModal">Donasi</a>
                </div>
            </div>
        </div>
    </div>
</div>


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

            <form action="<?= base_url('program1'); ?>" method="POST">
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

                    <div class="form-group">
                        <label for="bank">Transfer Bank</label>
                        <select class="form-control" id="bank" name="bank">
                            <option value="BRI : 0093-01-049032-50-6 ">BRI : 0093-01-049032-50-6 </option>
                            <option value="BNI : 0010-01-123456-00-8 ">BNI : 0010-01-123456-00-8 </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Upload Bukti Transaksi</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>

                        <!--  <div class="col-xl-3 mt-3">
                            <img src="<?= base_url('assets/img/bukti/') . $user['image']; ?>" class="img-thumbnail"> </div> -->

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submmit" class="btn btn-primary">Tambah</button>
                </div>
            </form>

        </div>
    </div>
</div>