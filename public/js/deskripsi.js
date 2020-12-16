$(document).ready(function () {
    $('#daftar_destinasku').on('click', '.tambah_deskripsi', function () {
        $('#tambah_deskripsi').modal('show');
        $('#id_deskripsi').val($(this).data('id'));
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