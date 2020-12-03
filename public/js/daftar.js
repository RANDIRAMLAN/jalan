$(document).ready(function () {
    $('.daftar').on('click', function () {
        $('#daftar').modal('show');
    });
    $('.daftar_app').submit('click', function () {
        let nama = $('#nama').val();
        let email = $('#daftar_email').val();
        let kata_sandi = $('#daftar_kata_sandi').val();
        let konfirmasi_kata_sandi = $('#daftar_konfirmasi_kata_sandi').val();
        $.ajax({
            type: 'post',
            url: '/Daftar/daftar',
            data: {
                nama: nama,
                email: email,
                kata_sandi: kata_sandi,
                konfirmasi_kata_sandi: konfirmasi_kata_sandi
            },
            dataType: 'json',
            success: function (response) {
                if(response.error){
                    if(response.error.nama){
                        $('#nama').addClass('is-invalid');
                        $('.error_nama').html(response.error.nama);
                    }else{
                        $('#nama').removeClass('is-invalid');
                        $('.error_nama').html("");
                    }
                    if(response.error.email){
                        $('#daftar_email').addClass('is-invalid');
                        $('.error_daftar_email').html(response.error.email);
                    }else{
                        $('#daftar_email').removeClass('is-invalid');
                        $('.error_daftar_email').html("");
                    }
                    if(response.error.kata_sandi){
                        $('#daftar_kata_sandi').addClass('is-invalid');
                        $('.error_daftar_kata_sandi').html(response.error.kata_sandi);
                    }else{
                        $('#daftar_kata_sandi').removeClass('is-invalid');
                        $('.error_daftar_kata_sandi').html("");
                    }
                    if(response.error.konfirmasi_kata_sandi){
                        $('#daftar_konfirmasi_kata_sandi').addClass('is-invalid');
                        $('.error_daftar_konfirmasi_kata_sandi').html(response.error.konfirmasi_kata_sandi);
                    }else{
                        $('#daftar_konfirmasi_kata_sandi').removeClass('is-invalid');
                        $('.error_daftar_konfirmasi_kata_sandi').html("");
                    }
                }else{
                    $('.buat_akun').removeClass('is-invalid');
                    $('.buat_akun').val("");
                    $('.buat_akun').html("");
                    $('#daftar').modal('hide');
                    $('#pesan').addClass('alert');
                    $('#pesan').html(response.pesan);
                    setTimeout(() => {
                        $('#pesan').removeClass('alert')
                        $('#pesan').html("");
                    }, 5000);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        
        return false;
    });
});