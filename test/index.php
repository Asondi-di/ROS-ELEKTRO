<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
$strBrandName = "sda";
        CEvent::Send("NEW_BRAND", 's1', [
            'EMAIL' => "dp@luckru.ru",
            'BRAND_NAME' => $strBrandName,
        ]);