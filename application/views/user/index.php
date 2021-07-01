<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
</div>
<!-- /.container-fluid -->

<!-- Content Row -->
<div class="col">

    <!-- Earnings (Monthly) Card Example -->
    <div class=" col-md-6 mb-4 col-lg-5 ml-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body shadow-4">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h6 font-weight-bold text-success text-uppercase text-align-center mb-3">
                            Jumlah Donasi Yang terkumpul</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= 'Rp.' . number_format($donatur->nominal, 2, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kodingan untuk menampilkan carosal atau slide image-->

    <div class="row justify-content-center shadow mb-2">
        <div class=" mr-2 ml-2 col-lg md-3 mb-1">
            <div class="card-body">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/home/gambar.4.jpg" class="d-block w-100" alt="..." style="height:300px; ">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>21 Orang Luka dalam Bentrokan Usai Sholat Ju'mat di Masjid Al-Aqsa</h3>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/home/gambar2.jpg" class="d-block w-100" alt="..." style="height:300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Israel Serang Palestina</h3>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/home/gambar3.jpg" class="d-block w-100" alt="..." style="height:300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Israel Serang Gaza Lewat Udara dan Laut, Militan Hamas Lakukan Balasan, Pertempuran Kian Memanas</h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/home/gambar1.jpg" class="d-block w-100" alt="..." style="height:300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Banjir Bandang NTT Awal April 2021 Terparah Dalam 10 Tahun Terakhir</h3>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/home/gambar5.jpg" class="d-block w-100" alt="..." style="height:300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Banjir Bandang Di NTT Awal April tahun 2021 </h3>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/home/gambar6.jpg" class="d-block w-100" alt="..." style="height:300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Gempa M 7,0 di NTB yang Mengguncang Agustus 2018</h3>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->