<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "На этой странице Вы можете ознакомиться с адресами всех магазинов компании РОС-ЭЛЕКТРО");
$APPLICATION->SetPageProperty("title", "Контакты — РОС-ЭЛЕКТРО");
$APPLICATION->SetTitle("Контакты");?>

<?CMax::ShowPageType('page_contacts');?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>