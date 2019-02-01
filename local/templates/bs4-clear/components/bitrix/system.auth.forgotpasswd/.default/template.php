<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (isset($APPLICATION->arAuthResult))
    $arResult['ERROR_MESSAGE'] = $APPLICATION->arAuthResult; ?>
<? global $arTheme; ?>
<div class="container-fluid auth_bg text-center">
    <form class="form_signin" name="bform" method="post" target="_top"
          action="/auth/forgot_passwd/?forgot_password=yes&send=yes">
        <input type="hidden" name="AUTH_FORM" value="Y">
        <input type="hidden" name="TYPE" value="SEND_PWD">
        <?
        $name = "AUTH_EMAIL";
        if ($arTheme["LOGIN_EQUAL_EMAIL"]["VALUE"] != "Y") {
            $name = "AUTH_LOGIN";
        } ?>
        <div class="row">
            <div class="col-2 authBack text-left">
                <a href="http://b2b.td-irbis.ru/auth/">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="col-10 text-right">
                <a class="forgot pull-right" target="_blank"
                   href="https://b24.irbis-td.ru/pub/form/2_registratsiya_na_korporativnom_portale/djbhhw/"><?= GetMessage("AUTH_REGISTER") ?></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 auth_logo text-left pt-4">
                <img src="/images/mainLogo.png">
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-left pt-1 forgort_text">Введите Ваш email, чтобы восстановить пароль</div>
        </div>
        <div class="row">
            <div class="col-12 text-left pt-1 err_text"><?= ShowMessage($arParams["~AUTH_RESULT"]); ?></div>
        </div>
        <div class="row input_row" data-sid="USER_LOGIN_POPUP">
            <div class="col-md-12 authInputBlock pt-4 text-left">
                <label for="USER_LOGIN_POPUP">Логин (e-mail)<span
                            class="required-star">*</span></label>
                <div class="input">
                    <input type="email" name="USER_EMAIL" id="USER_LOGIN_POPUP" class="required" maxlength="50"
                           value="<?= $arResult["USER_LOGIN"] ?>" autocomplete="on" tabindex="1"/>
                </div>
            </div>
        </div>
        <div class="row btn_row justify-content-center">
            <div class="col-8 pt-4">
                <button type="submit" class="btn auth_btn vbig_btn wides" name="send_account_info" value=""
                        tabindex="4"><?= GetMessage("RETRIEVE") ?></button>
            </div>
        </div>
    </form>
    <div class="authCopy">
        <div class="authCopy_text text-center">© Все права защищены ООО "Ирбис ТД" 2005-<?= date("Y") ?></div>
        <div class="authCopy_text text-center pl-4"><a target="_blank" href="https://irbis-td.ru/policy.html">Политика
                конфиденциальности и файлы cookie</a></div>
    </div>
</div>

<script type="text/javascript">
    document.bform.USER_EMAIL.focus();
</script>
<script>
    <?if($_GET["send"] == "yes"):?>
    $(document).ready(function () {
        console.log('111');
        if ($('.err_text .notetext').text() == 'Контрольная строка, а также ваши регистрационные данные были высланы по E-Mail. Пожалуйста, дождитесь письма, так как контрольная строка изменяется при каждом запросе.') {
            console.log('222');
            $('.input_row').remove();
            $('.btn_row ').remove();
            $('.err_text').remove();
            $('.forgort_text').text('На вашу почту отправлена ссылка восстановления пароля. Пожалуйста перейдите по ссылке в письме, чтобы восстановить пароль');
        }
    });
    <?endif;?>
</script>