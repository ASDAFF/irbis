var errorData = [];
errorData['login'] = 'Не заполнено поле "Логин"';
errorData['lastName'] = 'Не заполнено поле "Фамилия"';
errorData['name'] = 'Не заполнено поле "Имя"';
errorData['secondName'] = 'Не заполнено поле "Отчество"';
errorData['email'] = 'Не заполнено поле "Электронная почта"';
errorData['worked_with_us'] = 'Не выбрано поле "Работали с нами?"';
errorData['comment'] = 'Не выбрано поле "Почему Вы хотите стать нашим партнёром?"';
errorData['companyName'] = 'Не выбрано поле "Название организации"';

$(document).ready(function () {

    $('.reg_btn').click(function () {
        var templateFolder = $(this).attr("templateFolder");
        var file_data = $('#formControlFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('login',$('#InputLogin').val());
        form_data.append('lastName',$('#InputLastName').val());
        form_data.append('name',$('#InputName').val());
        form_data.append('secondName',$('#InputSecondName').val());
        form_data.append('email',$('#InputEmail').val());
        $('input[type=radio]').each(function () {
            if ($(this).is(':checked')) {
                form_data.append('comment',$(this).siblings('label').html());
            }
        });
        form_data.append('worked_with_us',$('#InputComment').val());
        form_data.append('companyName',$('#InputCompanyName').val());
        form_data.append('file', file_data);
        $.ajax({
            url: templateFolder + "/register.php",
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (rezult) {
                if (rezult != '') {
                    $('.ErrMsg').css('background-color','red');
                    $('.ErrMsg').html(rezult);
                }

            }
        });
    });
});