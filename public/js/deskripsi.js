$(document).ready(function () {
    $('#daftar_destinasku').on('click', '.tambah_deskripsi', function () {
        $('#tambah_deskripsi').modal('show');
        $('#id_deskripsi').val($(this).data('id'));
    });
});