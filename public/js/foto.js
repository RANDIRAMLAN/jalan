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
});