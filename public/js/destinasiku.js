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
                html +='<div class="col col-md-6">'+
                    '<div class="card mb-3 border-primary">'+
                    '<div class="row no-gutters">'+
                    '<div class="col-md-4">'+
                        '<img src="/img/Destinasi/'+ destinasiku[i].foto +'" class="card-img higth_picture" alt="'+ destinasiku[i].foto +'">'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<div class="card-body">'+
                            '<h5 class="card-title">'+ destinasiku[i].judul_destinasi +'</h5>'+
                            ' <p class="card-text">'+ destinasiku[i].deskripsi_singkat +'</p>'+
                            '<button class="btn btn-outline-primary btn-sm tambah_deskripsi ml-1" data-id ="'+destinasiku[i].id+'"><i class="fas fa-file"></i></button>'+
                            '<button class="btn btn-outline-primary btn-sm tambah_foto ml-1" data-id ="'+destinasiku[i].id+'"><i class="fas fa-file-image"></i></button>'+
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
});