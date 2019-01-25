<?
/**
 * Необходимо подключить в файле /bitrix/modules/main/include/prolog_after.php после в 81 строке
 * require($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/closeSiteForNoAuthorized.php");
 */
global $USER;
$closeSites = array ('s2');
$current_link  = $APPLICATION->GetCurPage();
$auth_link = '/auth/';
$execute_url = array(
    '/auth/change-password/',
    '/auth/forgot_passwd/',
);
if(in_array(SITE_ID, $closeSites) && $current_link != $auth_link && !in_array($current_link,$execute_url) && !CUser::IsAuthorized()) {
    ob_start();
    $new_url = $auth_link;
    header('Location: '.$new_url);
    ob_end_flush();
    die();
}
if($USER->IsAdmin() && SITE_ID == 's1' && $USER->IsAuthorized()) {
    header('Location: http://b2b.td-irbis.ru'.$APPLICATION->GetCurPage());
}


/*

 http://b2b.td-irbis.ru/auth/change-password/index.php?change_password=yes&lang=ru&USER_CHECKWORD=17c0d7a59c494ba9b198f4cef1335008&USER_LOGIN=zaytsev.max90%40gmail.com
 */