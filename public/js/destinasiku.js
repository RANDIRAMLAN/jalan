$(document).ready(function () {
    $('.destinasiku').on('click', function () {
        location.href = '/Menu/destinasiku';
    });
    show_data_destinasi();
    // menampilkan destinasiku
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
                        '<img src="/img/Destinasi/'+ destinasiku[i].foto +'" class="card-img higth_picture foto_sampul" data-id="'+ destinasiku[i].id +'" alt="'+ destinasiku[i].id +'">'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<div class="card-body">'+
                            '<h5 class="card-title">'+ destinasiku[i].judul_destinasi +'</h5>'+
                            ' <p class="card-text">'+ destinasiku[i].deskripsi_singkat +'</p>'+
                            '<button class="btn btn-outline-primary btn-sm tambah_deskripsi ml-1" data-id ="'+destinasiku[i].id+'"><i class="fas fa-file"></i></button>'+
                            '<button class="btn btn-outline-primary btn-sm foto_destinasi ml-1" data-id ="'+destinasiku[i].id+'"><i class="fas fa-file-image"></i></button>'+
                            '<button class="btn btn-outline-primary btn-sm show_data ml-1" data-id ="'+destinasiku[i].id+'"><i class="fas fa-info"></i></button>'+
                            '<button class="btn btn-outline-primary btn-sm ml-1" data-id ="'+destinasiku[i].id+'">'+ destinasiku[i].status +'</button>'+
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
// live search data
$('#cari').keyup(function () {
    show_data_destinasi();
});
// tambah Destinasi
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
    // foto destinasi
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
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});