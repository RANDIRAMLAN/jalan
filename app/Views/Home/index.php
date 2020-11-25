<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row margin_card">
    <div class="col col-md-12">
        <div class="alert alert-success text-center" role="alert">
            Kata Sandi Berhasil Diganti. Silahkan Masuk Menggunakan Kata Sandi Yang Baru.
        </div>
    </div>
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
                            <a href=""><strong> Selanjutnya</strong></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-md-6">
        <div class="card mb-3 border-primary">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/img/Destinasi/sumba.jpg" class="card-img higth_picture" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Pulau Lombok</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                            <a href=""><strong> Selanjutnya</strong></a>
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
                            <input type="text" name="email" id="email" class="form-control" autocomplete="off">
                            <small class="error_email invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="kata_sandi">Kata Sandi</label>
                            <input type="password" name="kata_sandi" id="kata_sandi" class="form-control" autocomplete="off">
                            <small class="error_kata_sandi invalid-feedback"></small>
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
                            <label for="daftar_email">Email</label>
                            <input type="text" name="email" id="daftar_email" class="form-control" autocomplete="off">
                            <small class="error_daftar_email invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="daftar_kata_sandi">Kata Sandi</label>
                            <input type="password" name="kata_sandi" id="daftar_kata_sandi" class="form-control" autocomplete="off">
                            <small class="error_daftar_kata_sandi invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="daftar_konfirmasi_kata_sandi">Konfirmasi Kata Sandi</label>
                            <input type="password" name="konfirmasi_kata_sandi" id="daftar_konfirmasi_kata_sandi" class="form-control" autocomplete="off">
                            <small class="error_daftar_konfirmasi_kata_sandi"></small>
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
                            <input type="text" name="email" id="lupa_email" class="form-control" autocomplete="off">
                            <small class="error_lupa_email invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="lupa_kata_sandi">Kata Sandi Baru</label>
                            <input type="password" name="kata_sandi" id="lupa_kata_sandi" class="form-control" autocomplete="off">
                            <small class="error_lupa_kata_sandi invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="lupa_konfirmasi_kata_sandi">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="lupa_kata_sandi" id="lupa_konfirmasi_kata_sandi" class="form-control" autocomplete="off">
                            <small class="error_lupa_konfirmasi_kata_sandi"></small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Daftar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>