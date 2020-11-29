<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand text-primary" href="/"><strong>JL</strong></a>
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
            <ul class="navbar-nav">
                <li class="nav-item ml-1">
                    <button class="btn btn-outline-primary my-2 my-sm-0 masuk">Masuk</button>
                </li>
                <li class="nav-item ml-1">
                    <button class="btn btn-outline-primary my-2 my-sm-0 daftar">Daftar</button>
                </li>
                <!-- <li class="nav-item dropdown ">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> Randi Ramlan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item">Destinasiku</button>
                            <button class="dropdown-item buat_destinasi">Buat Destinasi</button>
                            <button class="dropdown-item">Keluar</button>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</nav>