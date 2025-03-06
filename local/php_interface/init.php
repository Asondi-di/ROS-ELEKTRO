<?

# classes
include_once dirname(__FILE__) . "/luckru/classes/Brand.class.php";
include_once dirname(__FILE__) . "/luckru/classes/Mark.class.php";
include_once dirname(__FILE__) . "/luckru/classes/Requisites.php";
include_once dirname(__FILE__) . "/luckru/classes/Trades.php";

AddEventHandler("catalog", "OnSuccessCatalogImport1C", "OnSuccessCatalogImport1CHandler");
AddEventHandler("sale", "OnOrderNewSendEmail", "bxModifySaleMails");

function OnSuccessCatalogImport1CHandler()
{
    /*if (\CModule::IncludeModule("iblock")) {
        $arSelect = ['ID', 'NAME', 'IBLOCK_SECTION_ID', 'ACTIVE'];
        $arFilter = [
            "IBLOCK_ID" => 38,
            "ACTIVE" => 'N'
        ];

        $res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
        $arFields = array();

        while ($ob = $res->Fetch()) {
            $arFields[] = $ob;
        }

        if (!empty($arFields)) {
            $el = new CIBlockElement();

            foreach ($arFields as $elem) {
                $result = $el->Update($elem['ID'], array("ACTIVE" => "Y"));

                // Update stock quantity for the product
                if ($result) {
                    $productID = $elem['ID'];
                    $arStoreFields = array("AMOUNT" => 0); // Set the stock quantity to 0

                    // Get the list of stores for the product
                    $storeRes = CCatalogStoreProduct::GetList(
                        array(),
                        array("PRODUCT_ID" => $productID),
                        false,
                        false,
                        array("ID")
                    );

                    while ($store = $storeRes->Fetch()) {
                        // Update stock quantity for each store
                        CCatalogStoreProduct::Update($store["ID"], $arStoreFields);
                    }

                }
            }
        }
    }*/

    CModule::IncludeModule("iblock");

    $db_res = CIBlockElement::GetList([], [
        "CATALOG_QUANTITY" => 0,
        "IBLOCK_ID" => 38
    ], false, false, ["ID", "CATALOG_QUANTITY"]);


    $arRes = [];
    while($ar_res = $db_res->Fetch()) 
    {
        $arRes[] = $ar_res;
    }

    foreach($arRes as $arItem) 
    {
        CIBlockElement::Delete($arItem["ID"]);
    }

    $intClearCount = count($arRes);

    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/clear.log', $intClearCount . " " . date("Y-m-d H:i:s") . "\n\r", FILE_APPEND);
}

function pre($data, $file = false, $die = false, $all = false)
{
    global $USER;
    if ($USER->IsAdmin() || ($all === true)) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    if ($file) {
//        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/dump.log', var_export($data, true));
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/dump.log', var_export($data, true), FILE_APPEND);
    }
}

function bxModifySaleMails($orderID, &$eventName, &$arFields)
{
	$arFields["COMMENT"] = $_POST['ORDER_PROP_27'];

}
