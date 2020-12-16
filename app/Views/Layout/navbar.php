<!-- menu pada navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand text-primary" href="/"><strong>JL</strong></a>
        <div class="col col-md-5">
            <form class="cari_destinasi" method="post">
                <?= csrf_field(); ?>
                <input type="text" class="form-control border-primary cari" placeholder="Cari Destinasi" id="cari" name="cari" autocomplete="off">
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto mr-0">
                <?php foreach ($menu as $m) { ?>
                    <a type="button" class="nav-link text-primary <?= $m['attribut']; ?>"><?= $m['menu']; ?></a>
                <?php }; ?>
            </div>
        </div>
    </div>
</nav>
<!-- buat Destinasi -->
<div class="modal fade" id="buat_destinasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Destinasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="simpan_destinasi" accept="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="judul">Judul Destinasi</label>
                        <input type="text" name="judul_destinasi" id="judul_destinasi" class="form-control tambah_destinasi">
                        <small class="error_judul_destinasi tambah_destinasi invalid-feedback"></small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Singkat</label>
                        <textarea name="deskripsi_singkat" id="deskripsi_singkat" cols="30" rows="10" class="form-control tambah_destinasi"></textarea>
                        <small class="error_deskripsi_singkat tambah_destinasi invalid-feedback"></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>