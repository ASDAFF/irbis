<?
/**
 * Необходимо подключить в файле /bitrix/modules/main/include/prolog_after.php после в 81 строке
 * require($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/closeSiteForNoAuthorized.php");
 */
$closeSites = array ('s2');
$current_link  = $APPLICATION->GetCurPage();
$auth_link = '/auth/';
if(in_array(SITE_ID, $closeSites) && $current_link != $auth_link && !CUser::IsAuthorized()) {
    ob_start();
    $new_url = $auth_link;
    header('Location: '.$new_url);
    ob_end_flush();
    die();
}