<?php
namespace Luckru\Catalog;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("Luckru\Catalog\Mark", "OnAfterIBlockElementUpdateHandler"));

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("Luckru\Catalog\Mark", "OnAfterIBlockElementUpdateHandler"));

class Mark
{
    const CATALOG_IBLOCK_ID = 38;

    const AR_MARKS = 
    [
        "Акция"       => 344,
        "Новинка"     => 342,
        "ЛидерПродаж" => 341,
        "Распродажа"  => 2037
    ];

    public static function OnAfterIBlockElementUpdateHandler(&$arFields) 
    {
        if($arFields["IBLOCK_ID"] == self::CATALOG_IBLOCK_ID) 
        {
            $arMarks = self::GetMarks($arFields["ID"]);

            \CIBlockElement::SetPropertyValueCode($arFields["ID"], "HIT", $arMarks);
        }
    }

    public static function GetMarks($intElID)
    {
        $arMarks = [];

        $db_prop = \CIBlockElement::GetProperty(self::CATALOG_IBLOCK_ID, $intElID, array("sort" => "asc"), Array("CODE"=>"CML2_TRAITS"));

        while ($arRes = $db_prop->Fetch()) 
        {
            if(in_array($arRes["DESCRIPTION"], array_keys(self::AR_MARKS))) 
            {
                if($arRes["VALUE"] == "true") 
                {
                    $arMarks[] = self::AR_MARKS[$arRes["DESCRIPTION"]];
                }
            }
        }

        return $arMarks;
    }
}