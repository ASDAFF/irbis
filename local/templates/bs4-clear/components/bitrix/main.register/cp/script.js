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
        var parentForm = $(this).closest('#reg_form');
        var data = [];
        data['login'] = parentForm.find('#InputLogin').val();
        data['lastName'] = parentForm.find('#InputLastName').val();
        data['name'] = parentForm.find('#Inputname').val();
        data['secondName'] = parentForm.find('#InputSecondName').val();
        data['email'] = parentForm.find('#InputEmail').val();
        parentForm.find('input[type=radio]').each(function () {
            if ($(this).is(':checked')) {
                data['worked_with_us'] = $(this).siblings('label').html();
            }
        });
        data['comment'] = parentForm.find('#InputComment').val();
        data['companyName'] = parentForm.find('#InputCompanyName').val();
        console.log(data);
        $.each(data, function ( key, value ) {
            if (value == '') {
                var errMsg = '<div class="row"><div class="col">errorData[key]</div></div>';
            }
            console.log(errMsg);
        });
        // $('.ErrMsg').html(errMsg);

    });
});