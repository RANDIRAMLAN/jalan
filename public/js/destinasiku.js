$(document).ready(function () {
    $('.destinasiku').on('click', function () {
        location.href = '/Menu/destinasiku';
    });
    show_data_destinasi();
    // menampilkan data destinasiku
    function show_data_destinasi() {
        let cari = $('#cari').val();
        $.ajax({
            type: 'post',
            url: '/Destinasi/destinasiku',
            data: {cari: cari},
            dataType: 'json',
            success: function (destinasiku) {
                let html = '';
                let i;
                let no = 1;
                for (i = 0; i < destinasiku.length ; i++) {
                html +='<div class="col col-md-12">'+
                    '<div class="card mb-3 border-primary">'+
                    '<div class="row no-gutters">'+
                    '<div class="col-md-4">'+
                        '<img src="/img/Destinasi/'+ destinasiku[i].foto +'" class="card-img higth_picture foto_sampul" data-id="'+ destinasiku[i].id +'" data-foto="'+ destinasiku[i].foto +'" alt="'+ destinasiku[i].id +'" type="button" data-toggle="tooltip" data-placement="top" title="Klik Disini Untuk Mengganti Foto Sampul">'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<div class="card-body">'+
                            '<h5 class="card-title">'+ destinasiku[i].judul_destinasi +'</h5>'+
                            ' <p class="card-text">'+ destinasiku[i].deskripsi_singkat +'</p>'+
                            '<button class="btn btn-outline-primary btn-sm tambah_deskripsi ml-1" data-id ="'+destinasiku[i].id+'" data-toggle="tooltip" data-placement="top" title="Tambah Cerita Perjalanan"><i class="fas fa-file"></i></button>'+
                            '<button class="btn btn-outline-primary btn-sm foto_destinasi ml-1" data-id ="'+destinasiku[i].id+'" data-toggle="tooltip" data-placement="top" title="Tambah Foto Perjalanan"><i class="fas fa-file-image"></i></button>'+
                            '<button class="btn btn-outline-primary btn-sm tampilkan_destinasi ml-1" data-id ="'+destinasiku[i].id+'" data-toggle="tooltip" data-placement="top" title="Tampilkan Informasi Destinasi"><i class="fas fa-info"></i></button>'+
                            '<button class="btn btn-outline-primary btn-sm ubah_destinasi ml-1" data-id ="'+destinasiku[i].id+'" data-toggle="tooltip" data-placement="top" title="Hapus Cerita dan Foto Perjalanan"><i class="fas fa-minus-square"></i></button>'+
                            '<button class="btn btn-outline-primary ubah_status btn-sm ml-1" data-id ="'+destinasiku[i].id+'">'+ destinasiku[i].status +'</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        ' </div>';
        } 
            $('#daftar_destinasku').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    } 
    // live search data destinasiku
    $('#cari').keyup(function () {
        show_data_destinasi();
    });
    // tampilkan detail data destinasiku
    $('#daftar_destinasku').on('click', '.tampilkan_destinasi', function () {
        $('#tampilkan_destinasi').modal('show');
        let id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: '/Destinasi/tampilkan_data_destinasi',
            data:{
                id: id
            },
            dataType: 'json',
            success: function (data) {
                let html = '<div class="carousel-item active">'+
                                '<img src="/img/Destinasi/'+ data.foto_sampul.foto +'" class="d-block w-100" alt="...">'+
                            '</div>';
                let i;
                let no = 1;
                for (i = 0; i < data.foto.length; i++) {
                html +='<div class="carousel-item">'+
                            '<img src="/img/Destinasi/'+ data.foto[i].foto +'" class="d-block w-100" alt="...">'+
                        '</div>';
                } 
            $('#tampil_foto').html(html);

                let html2 = '';
                let j;
                let no2 = 1;
                for (j = 0; j < data.deskripsi.length; j++) {
                html2 +='<p class="text-justify">'+data.deskripsi[j].paragraf+'</p>';
                } 
                console.log(data.deskripsi);
            $('#cerita_perjalanan').html(html2);
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    // tampilkan menu ubah cerita dan foto perjalanan
    $('#daftar_destinasku').on('click', '.ubah_destinasi', function () {
    $('#ubah_destinasi').modal('show');
    let id = $(this).data('id');
    $.ajax({
        type: 'post',
        url: '/Destinasi/cerita_dan_foto',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (data) {
                let html = '';
                let i;
                let no = 1;
                for (i = 0; i < data.deskripsi.length; i++) {
                html +='<tr>'+
                            '<td>'+ no++ +'</td>'+
                            '<td>'+ data.deskripsi[i].paragraf +'</td>'+
                            '<td><button type="button" class="btn btn-outline-danger btn-sm hapus_paragraf" data-id="'+ data.deskripsi[i].id_destinasi +'" data-paragraf="'+ data.deskripsi[i].paragraf  +'">Hapus</button></td>'+
                        '</tr>';
                } 
                $('#cerita').html(html);

                let html2 = '';
                let j;
                let nomor = 1;
                for (j = 0; j < data.foto.length; j++) {
                html2 +='<tr>'+
                            '<td>'+ nomor++ +'</td>'+
                            '<td>'+ data.foto[j].foto +'</td>'+
                            '<td><button type="button" class="btn btn-outline-danger btn-sm hapus_foto" data-id="'+ data.foto[j].id_destinasi +'" data-foto="'+ data.foto[j].foto +'">Hapus</button></td>'+
                        '</tr>';
                } 
                $('#foto_foto').html(html2);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
        });
    });
    // ubah status destinasiku
    $('.ubah_status_destinasi').submit('click', function () {
        let id_ubah = $('#id_ubah').val();
        $.ajax({
            type: 'post',
            url: '/Destinasi/ubah_status_destinasi',
            data: {
                id_ubah: id_ubah
            },
            dataType: 'json',
            success: function (response) {
                $('#ubah_status_destinasi').modal('hide');
                $('#pesan').addClass('alert');
                $('#pesan').html(response.pesan);
                setTimeout(() => {
                    $('#pesan').html("");
                    $('#pesan').removeClass('alert');
                }, 3000);
                show_data_destinasi();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // tambah Destinasiku
    $('.simpan_destinasi').submit('click', function () {
        let judul_destinasi = $('#judul_destinasi').val();
        let deskripsi_singkat = $('#deskripsi_singkat').val();
        $.ajax({
            tyoe: 'post',
            url: '/Destinasi/tambah_destinasi',
            data: {
                judul_destinasi: judul_destinasi,
                deskripsi_singkat: deskripsi_singkat
            },
            dataType: 'json',
            success: function (response) {
                if(response.error){
                    if(response.error.judul_destinasi){
                        $('#judul_destinasi').addClass('is-invalid');
                        $('.error_judul_destinasi').html(response.error.judul_destinasi);
                    }else{
                        $('#judul_destinasi').removeClass('is-invalid');
                        $('.error_judul_destinasi').html("");
                    }
                    if(response.error.deskripsi_singkat){
                        $('#deskripsi_singkat').addClass('is-invalid');
                        $('.error_deskripsi_singkat').html(response.error.deskripsi_singkat);
                    }else{
                        $('#deskripsi_singkat').removeClass('is-invalid');
                        $('.error_deskripsi_singkat').html("");
                    }
                }else{
                    $('.tambah_destinasi').removeClass("is-invalid");
                    $('.tambah_destinasi').val("");
                    $('.tambah_destinasi').html("");
                    $('#buat_destinasi').modal('hide');
                    $('#pesan').addClass('alert');
                    $('#pesan').html(response.pesan);
                    setTimeout(() => {
                        $('#pesan').html("");
                        $('#pesan').removeClass('alert');
                    }, 3000);
                    show_data_destinasi();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
        // hapus foto destinasi perjalanan
    $('#foto_foto').on('click', '.hapus_foto', function () {
        let id = $(this).data('id');
        let foto = $(this).data('foto');
        $.ajax({
            type: 'post',
            url: '/Destinasi/hapus_foto',
            data: {
                id: id,
                foto: foto
            },
            dataType: 'json',
            success: function (data) {
                let html = '';
                let i;
                let no = 1;
                for (i = 0; i < data.foto.length; i++) {
                html +='<tr>'+
                            '<td>'+ no++ +'</td>'+
                            '<td>'+ data.foto[i].foto +'</td>'+
                            '<td><button type="button" class="btn btn-outline-danger btn-sm hapus_foto" data-id="'+ data.foto[i].id_destinasi +'" data-foto="'+ data.foto[i].foto  +'">Hapus</button></td>'+
                        '</tr>';
                } 
                $('#foto_foto').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
        });
    });
    // tambah foto destinasi perjalanan
    $('.btn_foto_destinasi').click(function () {
        let form = $('.tambah_foto_destinasi')[0];
        let data = new FormData(form);
        $.ajax({
            type: 'post',
            url: '/Destinasi/foto_destinasi',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function (response) {
                if(response.error){
                    if(response.error.foto_destinasi){
                        $('#foto_destinasi').addClass('is-invalid');
                        $('.error_foto_destinasi').html(response.error.foto_destinasi)
                    }else{
                        $('#foto_destinasi').removeClass('is-invalid');
                        $('.error_foto_destinasi').html("");
                    }
                }else{
                    $('#foto_destinasi').removeClass("is-invalid");
                    $('#foto_destinasi').val("");
                    $('.error_foto_destinasi').html("");
                    $('#tambah_foto_destinasi').modal('hide');
                    $('#pesan').addClass('alert');
                    $('#pesan').html(response.pesan);
                    setTimeout(() => {
                        $('#pesan').html("");
                        $('#pesan').removeClass('alert');
                    }, 3000);
                    show_data_destinasi();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // ubah foto sampul
    $('.btn_ubah_sampul').click(function () {
        let form = $('.ubah_foto_sampul')[0];
        let data = new FormData(form);
        $.ajax({
            type: 'post',
            url: '/Destinasi/foto_sampul',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function (response) {
                if(response.error){
                    if(response.error.foto_sampul){
                        $('#foto_sampul').addClass('is-invalid');
                        $('.error_foto_sampul').html(response.error.foto_sampul)
                    }else{
                        $('#foto_sampul').removeClass('is-invalid');
                        $('.error_foto_sampul').html("");
                    }
                }else{
                    $('#foto_sampul').removeClass("is-invalid");
                    $('#foto_sampul').val("");
                    $('.error_foto_sampul').html("");
                    $('#ubah_foto_sampul').modal('hide');
                    $('#pesan').addClass('alert');
                    $('#pesan').html(response.pesan);
                    setTimeout(() => {
                        $('#pesan').html("");
                        $('#pesan').removeClass('alert');
                    }, 3000);
                    show_data_destinasi();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // tambah deskripsi/paragraf perjalanan
    $('.tambah_deskripsi').submit('click', function () {
        let id_deskripsi = $('#id_deskripsi').val();
        let paragraf = $('#paragraf').val();
        $.ajax({
            type: 'post',
            url: '/Destinasi/tambah_deskripsi',
            data: {
                id_deskripsi: id_deskripsi,
                paragraf: paragraf
            },
            dataType: 'json',
            success: function (response) {
                if(response.error){
                    if(response.error.paragraf){
                        $('#paragraf').addClass('is-invalid');
                        $('.error_paragraf').html(response.error.paragraf);
                    }else{
                        $('#paragraf').removeClass('is-invalid');
                        $('.error_paragraf').html("");
                    }
                }else{
                    $('#paragraf').removeClass("is-invalid");
                    $('#paragraf').val("");
                    $('.error_paragraf').html("");
                    $('#tambah_deskripsi').modal('hide');
                    $('#pesan').addClass('alert');
                    $('#pesan').html(response.pesan);
                    setTimeout(() => {
                        $('#pesan').html("");
                        $('#pesan').removeClass('alert');
                    }, 3000);
                    show_data_destinasi();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // hapus paragraf
    $('#cerita').on('click', '.hapus_paragraf', function () {
        let id = $(this).data('id');
        let paragraf = $(this).data('paragraf');
        $.ajax({
            type: 'post',
            url: '/Destinasi/hapus_paragraf',
            data: {
                id: id,
                paragraf:paragraf
            },
            dataType: 'json',
            success: function (data) {
                let html = '';
                let i;
                let no = 1;
                for (i = 0; i < data.deskripsi.length; i++) {
                html +='<tr>'+
                            '<td>'+ no++ +'</td>'+
                            '<td>'+ data.deskripsi[i].paragraf +'</td>'+
                            '<td><button type="button" class="btn btn-outline-danger btn-sm hapus_paragraf" data-id="'+ data.deskripsi[i].id_destinasi +'" data-paragraf="'+ data.deskripsi[i].paragraf  +'">Hapus</button></td>'+
                        '</tr>';
                } 
                $('#cerita').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
        });
    });
});