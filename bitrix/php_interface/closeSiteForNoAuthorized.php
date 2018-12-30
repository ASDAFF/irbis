<?
$closeSites = array ('s2');
$current_link  = $APPLICATION->GetCurPage();
$auth_link = '/auth/';
if(in_array(SITE_ID, $closeSites) && $current_link != $auth_link && !CUser::IsAuthorized() ) {
    ob_start();
    $new_url = $auth_link;
    header('Location: '.$new_url);
    ob_end_flush();
    die();
}