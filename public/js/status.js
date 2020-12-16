    // status destinasi
    $('#daftar_destinasku').on('click', '.ubah_status', function () {
    $('#ubah_status_destinasi').modal('show');
    $('#id_ubah').val($(this).data('id'));
    // ubah status destinasi
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
    });