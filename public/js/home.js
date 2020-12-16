$(document).ready(function () {
    $('#daftar_destinasi').on('click', '.baca', function () {
        $('#baca').modal('show');
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
    destinasi();
    // menampilkan data destinasiku
    function destinasi() {
        let cari = $('#cari').val();
        $.ajax({
            type: 'post',
            url: '/Destinasi/destinasi',
            data: {cari: cari},
            dataType: 'json',
            success: function (destinasi) {
                let html = '';
                let i;
                for (i = 0; i < destinasi.length ; i++) {
                html +='<div class="col col-md-12">'+
                    '<div class="card mb-3 border-primary">'+
                    '<div class="row no-gutters">'+
                    '<div class="col-md-4">'+
                        '<img src="/img/Destinasi/'+ destinasi[i].foto +'" class="card-img higth_picture" alt="'+[i].id +'">'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<div class="card-body">'+
                            '<h5 class="card-title">'+ destinasi[i].judul_destinasi +'</h5>'+
                            ' <p class="card-text">'+ destinasi[i].deskripsi_singkat +'</p>'+
                            '<button class="btn btn-outline-primary btn-sm ml-1 baca" data-id ="'+destinasi[i].id+'">Selanjutnya</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        ' </div>';
        } 
        $('#daftar_destinasi').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    } 
    // live search data destinasiku
    $('.cari').keyup(function () {
        destinasi();
    });
});