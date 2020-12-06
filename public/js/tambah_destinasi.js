$(document).ready(function () {
    $('.buat_destinasi').on('click', function () {
        $('#buat_destinasi').modal('show');
    });
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
                    $('#pesan_tambah_destinasi').addClass('alert');
                    $('#pesan_tambah_destinasi').html(response.pesan);
                    setTimeout(() => {
                        $('#pesan_tambah_destinasi').html("");
                        $('#pesan_tambah_destinasi').removeClass('alert');
                    }, 3000);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});