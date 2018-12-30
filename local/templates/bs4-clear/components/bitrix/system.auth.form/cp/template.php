<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? CJSCore::Init(); ?>

<form id="avtorization-form" name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
      action="<?= $arParams["PERSONAL"] ?>?login=yes">
    <? if ($arResult["BACKURL"] <> ''): ?>
        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
    <? endif ?>
    <? foreach ($arResult["POST"] as $key => $value): ?><input type="hidden" name="<?= $key ?>"
                                                               value="<?= $value ?>" /><? endforeach ?>
    <input type="hidden" name="AUTH_FORM" value="Y"/>
    <input type="hidden" name="TYPE" value="AUTH"/>

    <div class="row" data-sid="USER_LOGIN_POPUP">
        <div class="col-md-12 authInputBlock">
            <label for="USER_LOGIN_POPUP"><?= GetMessage("AUTH_LOGIN") ?> <span class="required-star">*</span></label>
            <div class="input">
                <input type="text" name="USER_LOGIN" id="USER_LOGIN_POPUP" class="required" maxlength="50"
                       value="<?= $arResult["USER_LOGIN"] ?>" autocomplete="on" tabindex="1"/>
            </div>
        </div>
    </div>
    <div class="row" data-sid="USER_PASSWORD_POPUP">
        <div class="col-md-12 authInputBlock pt-4">
            <label for="USER_PASSWORD_POPUP"><?= GetMessage("AUTH_PASSWORD") ?> <span class="required-star">*</span></label>
            <div class="input">
                <input type="password" name="USER_PASSWORD" id="USER_PASSWORD_POPUP"
                       class="required password" maxlength="50" value="" autocomplete="on"
                       tabindex="2"/>
            </div>
        </div>
    </div>

    <? if ($arResult["CAPTCHA_CODE"]): ?>
        <div class="form-control bg register-captcha captcha-row clearfix">
            <label><span><?= GetMessage("AUTH_CAPTCHA_PROMT") ?>&nbsp;<span class="star">*</span></span></label>
            <div class="captcha_image">
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" border="0"/>
                <input type="hidden" name="captcha_sid" class="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                <div class="captcha_reload"><?= GetMessage("REFRESH") ?></div>
            </div>
            <div class="captcha_input">
                <input type="text" class="inputtext captcha" name="captcha_word" id="captcha_word" size="30"
                       maxlength="50" value="" required/>
            </div>
        </div>
    <? endif ?>

    <div class="row">
        <div class="col pt-2">
            <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" tabindex="5"/>
            <label for="USER_REMEMBER_frm" title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"
                   tabindex="5"><? echo GetMessage("AUTH_REMEMBER_SHORT") ?></label>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 pt-4">
            <button type="submit" class="btn auth_btn" name="Login" value="" tabindex="4"><?= GetMessage("AUTH_LOGIN_BUTTON") ?></button>
        </div>
    </div>
    <div class="row">
        <div class="col text-center pt-2">
            <a class="forgot pull-right" href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"]; ?>"
               tabindex="3"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a>
        </div>
    </div>
</form>
