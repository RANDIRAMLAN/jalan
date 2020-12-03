$(document).ready(function () {
    $('.lupa').on('click', function () {
        $('#masuk').modal('hide');
        $('#lupa').modal('show');
    });
    $('.lupa_app').submit('click', function () {
        let email = $('#lupa_email').val();
        let kata_sandi = $('#lupa_kata_sandi').val();
        let konfirmasi_kata_sandi = $('#lupa_konfirmasi_kata_sandi').val();
        $.ajax({
            type: 'post',
            url: '/Lupa/lupa',
            data: {
                email: email,
                kata_sandi: kata_sandi,
                konfirmasi_kata_sandi: konfirmasi_kata_sandi
            },
            dataType: 'json',
            success: function (response) {
            if(response.error){
                if(response.error.email){
                    $('#lupa_email').addClass('is-invalid');
                    $('.error_lupa_email').html(response.error.email)
                }else{
                    $('#lupa_email').removeClass('is-invalid');
                    $('.error_lupa_email').html("");
                }
                if(response.error.kata_sandi){
                    $('#lupa_kata_sandi').addClass('is-invalid');
                    $('.error_lupa_kata_sandi').html(response.error.kata_sandi);
                }else{
                    $('#lupa_kata_sandi').removeClass('is-invalid');
                    $('.error_lupa_kata_sandi').html("");
                }
                if(response.error.konfirmasi_kata_sandi){
                    $('#lupa_konfirmasi_kata_sandi').addClass('is-invalid');
                    $('.error_lupa_konfirmasi_kata_sandi').html(response.error.konfirmasi_kata_sandi);
                }else{
                    $('#lupa_konfirmasi_kata_sandi').removeClass('is-invalid');
                    $('.error_lupa_konfirmasi_kata_sandi').html("");
                }
            }else{
                $('.lupa_sandi').removeClass('is-invalid');
                $('.lupa_sandi').val("");
                $('.lupa_sandi').html("");
                $('#lupa').modal('hide');
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