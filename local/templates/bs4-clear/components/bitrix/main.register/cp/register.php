<?php
if (empty($_SERVER["HTTP_REFERER"])) die();
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

//var_dump($_FILES["file"]["tmp_name"]);

$errText = '';

$user = new CUser;

if ($_POST["email"] == '') {
    $errText .= "<div class=\"row\"><div class=\"col no-padding errText\">Не заполнено поле Электронная почта</div></div>";
} else {
    $order = array('sort' => 'ID');
    $tmp = 'sort';
    $filter = array('EMAIL' => $_POST["email"]);

    $rsUsers = $user->GetList($order, $tmp, $filter);

    while ($arUser = $rsUsers->Fetch()) {
        if (!empty($arUser)) {
            $errText .= '<div class="row"><div class="col no-padding errText">Пользователь с такой почтой уже существует</div></div>';
        }
    }
}

$errArray = [
    "login" => "<div class=\"row\"><div class=\"col no-padding errText\">Не заполнено поле Логин</div></div>",
    "lastName" => "<div class=\"row\"><div class=\"col no-padding errText\">Не заполнено поле Фамилия</div></div>",
    "name" => "<div class=\"row\"><div class=\"col no-padding errText\">Не заполнено поле Имя</div></div>",
    "secondName" => "<div class=\"row\"><div class=\"col no-padding errText\">Не заполнено поле Отчество</div></div>",
    "worked_with_us" => "<div class=\"row\"><div class=\"col no-padding errText\">Не выбрано значение Работали ли Вы с нами?</div></div>",
    "comment" => "<div class=\"row\"><div class=\"col no-padding errText\">Не заполнено поле Почему вы хотите работать с нами?</div></div>",
    "companyName" => "<div class=\"row\"><div class=\"col no-padding errText\">Не заполнено поле Название компании</div></div>",
    "file" => "<div class=\"row\"><div class=\"col no-padding errText\">Не выбран файл с карточкой организации</div></div>",
];

foreach ($_POST as $key => $value) {
    if (($value == '' && $key !== "email") || $value == 'undefined') {
        $errText .= $errArray[$key];
    }
}

$filesTypes = ["DOCM", "docx", "dot", "dotm", "dotx", "PDF", "pdf", "RTF", "XML", "ods", "xls", "xlsx", "xltm"];

if (!in_array(getFileTypeFromAjax($_FILES["file"]["name"]), $filesTypes)) {
    $errText .= "<div class=\"row\"><div class=\"col no-padding errText\">Был загружен файл неверного разрешения</div></div>";
} else {
    $fileName = generateID() . '.' . getFileTypeFromAjax($_FILES["file"]["name"]);
    $filePath = '/upload/company_card/' . $fileName;
    move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
}

if ($errText != '') {
    echo $errText;
} else {
    $pass = generate_password(8);
    $userId = $user->Add(array(
        "LOGIN" => $_POST["login"],
        "LAST_NAME" => $_POST["lastName"],
        "NAME" => $_POST["name"],
        "SECOND_NAME" => $_POST["secondName"],
        "EMAIL" => $_POST["email"],
        "PASSWORD" => $pass,
        "ACTIVE" => "N",
        "CONFIRM_PASSWORD" => $pass,
        "UF_WORKED_WITH" => $_POST["worked_with_us"],
        "UF_PARTNERSHIP_GOAL" => $_POST["comment"],
        "UF_COMPANY_NAME" => $_POST["companyName"],
        "UF_COMPANY_CARD" => $filePath,
    ));
}

function generate_password($number)
{
    $arr = array('a', 'b', 'c', 'd', 'e', 'f',
        'g', 'h', 'i', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'r', 's',
        't', 'u', 'v', 'x', 'y', 'z',
        'A', 'B', 'C', 'D', 'E', 'F',
        'G', 'H', 'I', 'J', 'K', 'L',
        'M', 'N', 'O', 'P', 'R', 'S',
        'T', 'U', 'V', 'X', 'Y', 'Z',
        '1', '2', '3', '4', '5', '6',
        '7', '8', '9', '0', '.', ',',
        '(', ')', '[', ']', '!', '?',
        '&', '^', '%', '@', '*', '$',
        '<', '>', '/', '|', '+', '-',
        '{', '}', '`', '~');
    // Генерируем пароль
    $pass = "";
    for ($i = 0; $i < $number; $i++) {
        // Вычисляем случайный индекс массива
        $index = rand(0, count($arr) - 1);
        $pass .= $arr[$index];
    }
    return $pass;
}

function getFileTypeFromAjax($fileName)
{
    $fileTypesArray = explode(".", $fileName);
    return array_pop($fileTypesArray);
}

function generateID($prefix = null, $postfix = null)
{
    $codeletters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $date = date("YmdHis");
    $mtime = microtime(true);
    $time = floor($mtime);
    $ms = round(($mtime - $time) * 1000);
    if (strlen($ms) === 0) {
        $date .= "000";
    } else if (strlen($ms) === 1) {
        $date .= "00";
    } else if (strlen($ms) === 2) {
        $date .= "0";
    }
    $date .= $ms;
    if ($prefix == null) {
        $code = '';
    } else {
        $code = $prefix . '-';
    }
    for ($i = 0, $j = 0; $i < strlen($date); $i++) {
        $j++;
        $code .= $codeletters[$date[$i]];
        $code .= $codeletters[rand(0, strlen($codeletters) - 1)];
        if ($j === 6) {
            $code .= $codeletters[rand(0, strlen($codeletters) - 1)];
            $code .= "-";
            $j = 0;
        }
    }
    if ($postfix == null) {
        return substr($code, 0, strlen($code) - 1);
    } else {
        return $code . "-" . $postfix;
    }
}