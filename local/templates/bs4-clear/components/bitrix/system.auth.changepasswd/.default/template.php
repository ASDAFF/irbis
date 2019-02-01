<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="container-fluid auth_bg text-center">
    <form class="form_signin" method="post" action="<?= $arResult["AUTH_FORM"] ?>" name="bform">
        <? if (strlen($arResult["BACKURL"]) > 0): ?>
            <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
        <? endif ?>
        <input type="hidden" name="AUTH_FORM" value="Y">
        <input type="hidden" name="TYPE" value="CHANGE_PWD">
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
            <div class="col-12 text-left pt-1 forgort_text">Введите дважды новый пароль</div>
        </div>
        <div class="row">
            <div class="col-12 text-left pt-1 err_text"><?= ShowMessage($arParams["~AUTH_RESULT"]); ?></div>
        </div>
        <input type="hidden" name="USER_LOGIN" maxlength="50" value="<?= $arResult["LAST_LOGIN"] ?>"
               class="bx-auth-input"/>
        <input type="hidden" name="USER_CHECKWORD" maxlength="50" value="<?= $arResult["USER_CHECKWORD"] ?>"
               class="bx-auth-input"/>
        <div class="form-group authInputBlock text-left pt-4">
            <label for="newPass">Пароль*</label>
            <div class="input">
                <input type="password" name="USER_PASSWORD" maxlength="50" value="<?= $arResult["USER_PASSWORD"] ?>"
                       class="form-control bx-auth-input" aria-describedby="newPassHelp" autocomplete="off">
                <i class="fas fa-eye"></i>
            </div>
        </div>
        <div class="form-group authInputBlock text-left">
            <label for="newPass">Введите еще раз*</label>
            <div class="input">
                <input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50"
                       value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>" class="form-control bx-auth-input"
                       aria-describedby="newPassHelp" autocomplete="off">
                <i class="fas fa-eye"></i>
            </div>
        </div>
        <div class="row btn_row justify-content-center">
            <div class="col-8 pt-4">
                <button type="submit" class="btn auth_btn vbig_btn wides" name="change_pwd"
                        tabindex="4">Поменять
                </button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    document.bform.USER_LOGIN.focus();
</script>