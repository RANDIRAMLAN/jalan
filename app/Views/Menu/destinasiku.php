<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<!-- list destinasiku -->
<div class="margin">
    <div class="container">
        <div class="col col-md-12">
            <p id="pesan" class="alert-success text-center" role="alert"></p>
            <div class="row margin_card">
                <div id="daftar_destinasku"></div>
            </div>
        </div>
        <!-- cerita perjalanan-->
        <div class="modal fade" id="tambah_deskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cerita Perjalanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="tambah_deskripsi" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <input type="hidden" name="id_deskripsi" id="id_deskripsi">
                                <textarea name="paragraf" id="paragraf" cols="30" rows="10" class="form-control"></textarea>
                                <small class="error_paragraf invalid-feedback"></small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ubah foto Sampul -->
        <div class="modal fade" id="ubah_foto_sampul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto Sampul</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="ubah_foto_sampul" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <input type="hidden" id="id_sampul" name="id_sampul">
                                <input type="file" name="foto_sampul" id="foto_sampul" class="form-control-file">
                                <small class="error_foto_sampul invalid-feedback"></small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary btn_ubah_sampul">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- foto destinasi -->
        <div class="modal fade" id="tambah_foto_destinasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto Destinasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="tambah_foto_destinasi" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <input type="hidden" name="id_destinasi" id="id_destinasi">
                                <input type="file" name="foto_destinasi" id="foto_destinasi" class="form-control-file">
                                <small class="error_foto_destinasi invalid-feedback"></small>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary btn_foto_destinasi">Simpan</button>
                    </div>
                    </form>
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
                                    <img src="/img/Destinasi/Default.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/Destinasi/Default.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/Destinasi/Default.jpg" class="d-block w-100" alt="...">
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
        <!-- ubah status destinasi -->
        <div class="modal fade" id="ubah_status_destinasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="ubah_status_destinasi" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <input type="hidden" name="id_ubah" id="id_ubah">
                                Apakah Andah Yakin Ingin Mengubah Status Destinasi ?
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>