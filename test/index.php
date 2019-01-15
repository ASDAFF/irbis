<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");?>

<?
$user = new CUser;
$order = array('sort' => 'ID');
$tmp = 'sort';
$filter = array('EMAIL' => 'info@compuproject.com');

$rsUsers = $user->GetList($order,$tmp,$filter);

while ($arUser = $rsUsers->Fetch()) {
//    var_dump($arUser);
    if (!empty($arUser)) {
        echo 1111;
    }
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>