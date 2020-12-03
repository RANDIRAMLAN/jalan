<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="margin">
    <div class="col col-md-12">
        <p id="pesan" class="alert-success text-center" role="alert">
        </p>
    </div>
    <div class="row margin_card">
        <div class="col col-md-6">
            <div class="card mb-3 border-primary">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/Destinasi/lombok.jpg" class="card-img higth_picture" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Pulau Lombok</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                <a class="show_data"><strong> Selanjutnya</strong></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Masuk -->
        <div class="modal fade" id="masuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masuk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="masuk_app" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="masuk_email" class="form-control" autocomplete="off">
                                <small class="error_masuk_email invalid-feedback"></small>
                            </div>
                            <div class="form-group">
                                <label for="kata_sandi">Kata Sandi</label>
                                <input type="password" name="kata_sandi" id="masuk_kata_sandi" class="form-control" autocomplete="off">
                                <small class="error_masuk_kata_sandi invalid-feedback"></small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger lupa">Lupa Kata Sandi</button>
                        <button type="submit" class="btn btn-outline-primary ">Masuk</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal daftar -->
        <div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="daftar_app" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control buat_akun" autocomplete="off">
                                <small class="error_nama invalid-feedback buat_akun"></small>
                            </div>
                            <div class="form-group">
                                <label for="daftar_email">Email</label>
                                <input type="text" name="email" id="daftar_email" class="form-control buat_akun" autocomplete="off">
                                <small class="error_daftar_email invalid-feedback buat_akun"></small>
                            </div>
                            <div class="form-group">
                                <label for="daftar_kata_sandi">Kata Sandi</label>
                                <input type="password" name="kata_sandi" id="daftar_kata_sandi" class="form-control buat_akun" autocomplete="off">
                                <small class="error_daftar_kata_sandi invalid-feedback buat_akun"></small>
                            </div>
                            <div class="form-group">
                                <label for="daftar_konfirmasi_kata_sandi">Konfirmasi Kata Sandi</label>
                                <input type="password" name="konfirmasi_kata_sandi" id="daftar_konfirmasi_kata_sandi" class="form-control buat_akun" autocomplete="off">
                                <small class="error_daftar_konfirmasi_kata_sandi invalid-feedback buat_akun"></small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">Daftar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal lupa sandi -->
        <div class="modal fade" id="lupa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lupa Kata Sandi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="lupa_app" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="daftar_email">Email</label>
                                <input type="text" name="email" id="lupa_email" class="form-control lupa_sandi" autocomplete="off">
                                <small class="error_lupa_email invalid-feedback lupa_sandi"></small>
                            </div>
                            <div class="form-group">
                                <label for="lupa_kata_sandi">Kata Sandi Baru</label>
                                <input type="password" name="kata_sandi" id="lupa_kata_sandi" class="form-control lupa_sandi" autocomplete="off">
                                <small class="error_lupa_kata_sandi invalid-feedback lupa_sandi"></small>
                            </div>
                            <div class="form-group">
                                <label for="lupa_konfirmasi_kata_sandi">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" name="konfirmasi_kata_sandi" id="lupa_konfirmasi_kata_sandi" class="form-control lupa_sandi" autocomplete="off">
                                <small class="error_lupa_konfirmasi_kata_sandi invalid-feedback lupa_sandi"></small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- show data -->
    <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pulau Lombok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" style="height: 250px;">
                            <div class="carousel-item active">
                                <img src="/img/Destinasi/lombok.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/Destinasi/sumba.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/Destinasi/lombok.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                    <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem magnam laudantium nihil exercitationem dolorum voluptatibus cumque suscipit blanditiis culpa, quia vel a saepe, asperiores facere nobis consectetur accusamus delectus deserunt reprehenderit quibusdam autem temporibus nostrum nesciunt? Aut, atque? Quo saepe quia, tempora nihil quaerat reiciendis dolor adipisci exercitationem quisquam alias.</p>
                    <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam officiis magnam autem tempore quas odio error, molestias possimus dicta ducimus numquam libero, animi sunt deserunt neque ullam praesentium modi delectus?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary">Tanya Penulis</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Berhasil masuk aplikasi -->
<div class="modal fade" id="informasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title ml-auto mr-auto text-primary" id="exampleModalLabel"><strong>Selamat Datang</strong></h5>
            </div>
            <div class="modal-body">
                <p class="informasi"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ml-auto mr-auto" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>