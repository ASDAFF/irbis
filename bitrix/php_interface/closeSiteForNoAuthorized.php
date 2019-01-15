<?
/**
 * Необходимо подключить в файле /bitrix/modules/main/include/prolog_after.php после в 81 строке
 * require($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/closeSiteForNoAuthorized.php");
 */
$closeSites = array ('s2');
$current_link  = $APPLICATION->GetCurPage();
$auth_link = '/auth/';
$change_password_link = '/auth/change-password/';
if(in_array(SITE_ID, $closeSites) && $current_link != $auth_link && $current_link != $change_password_link && !CUser::IsAuthorized()) {
    ob_start();
    $new_url = $auth_link;
    header('Location: '.$new_url);
    ob_end_flush();
    die();
}

/*

 http://b2b.td-irbis.ru/auth/change-password/index.php?change_password=yes&lang=ru&USER_CHECKWORD=17c0d7a59c494ba9b198f4cef1335008&USER_LOGIN=zaytsev.max90%40gmail.com
 */