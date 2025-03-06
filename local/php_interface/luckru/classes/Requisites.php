<?php
namespace Luckru\Catalog;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("Luckru\Catalog\Requisites", "OnAfterIBlockElementUpdateHandler"));

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("Luckru\Catalog\Requisites", "OnAfterIBlockElementUpdateHandler"));

class Requisites
{
    const CATALOG_IBLOCK_ID = 38;
    const REQ_PROPERTY_ID = 716;

    const ARRAY_REQUISITES = [
        "ВнутреннийКод" => 1012,
        "КоличествоВМинимальнойУпаковке" => 1013,
        "Кратность" => 1014,
        "Объем" => 1015,
        "Вес" => 1016
    ];

    public static function OnAfterIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields["IBLOCK_ID"] == self::CATALOG_IBLOCK_ID)
        {
            $reqProperty = $arFields["PROPERTY_VALUES"][self::REQ_PROPERTY_ID];
            if (!$reqProperty) return;

            $arPropertiesToUpdate = [];
            foreach ($reqProperty as $property)
            {
                if ( self::ARRAY_REQUISITES[$property["DESCRIPTION"]] and $property["VALUE"] )
                    $arPropertiesToUpdate[self::ARRAY_REQUISITES[$property["DESCRIPTION"]]] = $property["VALUE"];
            }

            if (!empty($arPropertiesToUpdate))
            {
                \CIBlockElement::SetPropertyValuesEx(
                    $arFields["ID"],
                    $arFields["IBLOCK_ID"],
                    $arPropertiesToUpdate
                );
            }
        }
    }
}