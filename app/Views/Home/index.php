<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="margin">
    <div class="container">
        <div class="col col-md-12">
            <p id="pesan" class="alert-success text-center" role="alert"></p>
            <div class="row margin_card">
                <div id="daftar_destinasi"></div>
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
        <!-- tampilkan detail destinasi -->
        <div class="modal fade" id="baca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Destinasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div id="tampil_foto" class="carousel-inner" style="height: 350px;">
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
                        <div id="cerita_perjalanan"></div>
                    </div>
                    <div class="modal-footer">
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
    </div>
</div>
<?= $this->endSection(); ?>