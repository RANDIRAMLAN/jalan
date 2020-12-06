<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<!-- list destinasiku -->
<div class="margin">
    <div class="col col-md-12">
        <p id="pesan_tambah_destinasi" class="alert-success text-center" role="alert">
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
                            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                <button class="btn btn-outline-primary btn-sm tambah_deskripsi">Deskripsi Lengkap</button>
                                <button class="btn btn-outline-primary btn-sm tambah_foto">Foto</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- deskripsi lengkap -->
<div class="modal fade" id="tambah_deskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deskripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="tambah_deskripsi" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <textarea name="paragraf[]" id="paragraf" cols="30" rows="10" class="form-control"></textarea>
                        <button class="btn btn-outline-danger btn-sm mt-1">Hapus</button>
                        <small class="error_paragraf invalid-feedback"></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary">Tambah Paragraf</button>
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- tambah foto -->
<div class="modal fade" id="tambah_foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="tambah_foto" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td>
                                    <button class="btn btn-outline-danger btn-sm">Hapus</button>
                                </td>
                                <td>
                                    <input type="file" name="foto[]" id="foto" class="form-control-file">
                                </td>
                            </tr>
                        </table>
                        <small class="error_foto invalid-feedback"></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary">Tambah Foto</button>
                <button type="button" class="btn btn-outline-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>