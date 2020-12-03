$(document).ready(function () {
    $('.masuk').on('click', function () {
        $('#masuk').modal('show');
    });
    $('.masuk_app').submit('click', function () {
        let email = $('#masuk_email').val();
        let kata_sandi = $('#masuk_kata_sandi').val();
        $.ajax({
            type: 'post',
            url: '/Masuk/masuk',
            data: {
                email: email,
                kata_sandi: kata_sandi
            },
            dataType: 'json',
            success: function (response) {
                if (response.error){
                    if(response.error.email){
                        $('#masuk_email').addClass('is-invalid');
                        $('.error_masuk_email').html(response.error.email);
                    }else{
                        $('#masuk_email').removeClass('is-invalid');
                        $('.error_masuk_email').html("");
                    }
                    if(response.error.kata_sandi){
                        $('#masuk_kata_sandi').addClass('is-invalid');
                        $('.error_masuk_kata_sandi').html(response.error.kata_sandi);
                    }else{
                        $('#masuk_kata_sandi').removeClass('is-invalid');
                        $('.error_masuk_kata_sandi').html("");
                    }
                }else{
                    $('#masuk').modal('hide');
                    $('#informasi').modal('show');
                    $('.informasi').html(response.pesan);
                    setTimeout(() => {
                        $('#informasi').modal('hide');
                        location.href = '/Home/index';
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