$(document).ready(function () {
    $("form[name=bx_auth_servicesform]").validate();
    $('.auth_wrapp .form-body a').removeAttr('onclick');
    $('form#avtorization-form').validate({
        rules:{
            USER_LOGIN:{
                required:true
            }
        },
        submitHandler: function( form ){
            if( $( form ).valid() ){
                /*var eventdata = {type: 'form_submit', form: form, form_name: 'AUTH'};
                 BX.onCustomEvent('onSubmitForm', [eventdata]);*/

                jsAjaxUtil.CloseLocalWaitWindow( 'id', 'wrap_ajax_auth' );
                jsAjaxUtil.ShowLocalWaitWindow( 'id', 'wrap_ajax_auth', true );

                var bCaptchaInvisible = false;
                if(window.renderRecaptchaById && window.asproRecaptcha && window.asproRecaptcha.key)
                {
                    if(window.asproRecaptcha.params.recaptchaSize == 'invisible')
                    {
                        if(!$(form).find('.g-recaptcha-response').val())
                        {
                            grecaptcha.execute($(form).find('.g-recaptcha').data('widgetid'));
                            bCaptchaInvisible = true;
                        }
                    }
                }
                if(!bCaptchaInvisible)
                {
                    $.ajax({
                        type: "POST",
                        url: $(form).attr('action'),
                        data: $(form).serialize()
                    }).done(function( html ){
                        if($(html).find('.alert').length)
                        {
                            $('#ajax_auth').html( html );
                        }
                        else
                            BX.reload(false);

                        jsAjaxUtil.CloseLocalWaitWindow( 'id', 'wrap_ajax_auth' );
                    });
                }
            }
        },
        errorPlacement: function( error, element ){
            $( error ).attr( 'alt', $( error ).text() );
            $( error ).attr( 'title', $( error ).text() );
            error.insertBefore( element );
        }
    } );

    var inputChecker = "TRUE";

    $(".authInputBlock .input i").click(function () {
        if (inputChecker == "TRUE") {
            $(this).siblings('input').attr('type','text');
            $(this).removeClass("fa-eye");
            $(this).addClass("fa-eye-slash");
            inputChecker = "FALSE"
        } else {
            $(this).siblings('input').attr('type','password');
            $(this).removeClass("fa-eye-slash");
            $(this).addClass("fa-eye");
            inputChecker = "TRUE"
        }
    });
});
