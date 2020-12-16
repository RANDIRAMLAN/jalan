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
});