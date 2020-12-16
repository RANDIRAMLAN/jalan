$(document).ready(function () {
    // modal foto sampul
    $('#daftar_destinasku').on('click', '.foto_sampul', function () {
        $('#ubah_foto_sampul').modal('show');
        $('#id_sampul').val($(this).data('id'));
    });
    // modal foto perjalanan
    $('#daftar_destinasku').on('click', '.foto_destinasi', function () {
    $('#tambah_foto_destinasi').modal('show');
    $('#id_destinasi').val($(this).data('id'));
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
});