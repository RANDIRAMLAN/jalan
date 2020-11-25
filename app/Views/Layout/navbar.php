<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand text-primary margin_navbar" href="/"><strong>JL</strong></a>
    <div class="col col-md-10">
        <form class="cari_destinasi" method="post">
            <?= csrf_field(); ?>
            <input type="text" class="form-control border-primary" placeholder="Cari Destinasi" id="cari" name="cari" autocomplete="off">
        </form>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto margin_navbar">
            <li class="nav-item active">
                <button class="btn btn-outline-primary my-2 my-sm-0 mr-2 masuk">Masuk</button>
            </li>
            <li class="nav-item">
                <button class="btn btn-outline-primary my-2 my-sm-0 daftar">Daftar</button>
            </li>
        </ul>
    </div>
</nav>