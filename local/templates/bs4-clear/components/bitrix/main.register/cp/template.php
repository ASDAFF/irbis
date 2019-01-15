<!--<form id="reg_form" action="adsdsadad/" enctype="multipart/form-data" >-->
<div class="row mx-1 ErrRow">
    <div class="col ErrMsg py-2"></div>
</div>
<div class="form-group">
    <label for="InputLogin">Логин: <span class="required-star">*</span></label>
    <input type="text" class="form-control" id="InputLogin" aria-describedby="loginHelp">
    <small id="loginHelp" class="form-text text-muted"><?= GetMessage("REGISTER_FIELD_LOGIN") ?></small>
</div>
<div class="form-group">
    <label for="InputLastName">Фамилия: <span class="required-star">*</span></label>
    <input type="text" class="form-control" id="InputLastName" aria-describedby="lastNameHelp">
</div>
<div class="form-group">
    <label for="InputName">Имя: <span class="required-star">*</span></label>
    <input type="text" class="form-control" id="InputName" aria-describedby="nameHelp">
</div>
<div class="form-group">
    <label for="InputSecondName">Отчество: <span class="required-star">*</span></label>
    <input type="text" class="form-control" id="InputSecondName" aria-describedby="secondNameHelp">
</div>
<div class="form-group">
    <label for="InputEmail">Электронная почта: <span class="required-star">*</span></label>
    <input type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp">
</div>
<div class="row">
    <div class="col">Работали с нами? <span class="required-star">*</span></div>
</div>
<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
    <label class="form-check-label" for="inlineRadio1">Да</label>
</div>
<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
    <label class="form-check-label" for="inlineRadio2">Нет</label>
</div>
<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
    <label class="form-check-label" for="inlineRadio3">Не помню</label>
</div>
<div class="form-group pt-3">
    <label for="InputComment">Почему Вы хотите стать нашим партнёром? <span class="required-star">*</span></label>
    <textarea type="text" class="form-control bigArea" id="InputComment" aria-describedby="commentHelp"></textarea>
</div>
<div class="form-group">
    <label for="InputCompanyName">Название организации: <span class="required-star">*</span></label>
    <input type="text" class="form-control" id="InputCompanyName" aria-describedby="companyNameHelp">
</div>
<form enctype="multipart/form-data">
    <div class="form-group mb-0">
        <label for="formControlFile">Файл с карточкой организации <span class="required-star">*</span></label>
        <input type="file" class="form-control-file" id="formControlFile">
    </div>
</form>
<div class="row justify-content-center">
    <div class="col-8 pt-4">
        <button templateFolder="<?= $templateFolder ?>" type="submit"
                class="btn reg_btn"><?= GetMessage("REGISTER_REGISTER") ?></button>
    </div>
</div>
<!--</form>-->