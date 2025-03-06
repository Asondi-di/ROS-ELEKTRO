<?php
namespace Luckru\Catalog;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("Luckru\Catalog\Trades", "OnAfterIBlockElementUpdateHandler"));

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("Luckru\Catalog\Trades", "OnAfterIBlockElementUpdateHandler"));



AddEventHandler("catalog", "OnBeforePriceAdd", Array("Luckru\Catalog\Trades", "OnBeforeProductUpdateHandler"));

AddEventHandler("catalog", "OnBeforePriceUpdate", Array("Luckru\Catalog\Trades", "OnBeforeProductUpdateHandler"));

class Trades
{
    const CATALOG_IBLOCK_ID = 38;

    public static function OnAfterIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields["IBLOCK_ID"] == self::CATALOG_IBLOCK_ID)
        {
         
        }
    }

    public static function OnBeforeProductUpdateHandler($ID, &$arPriceFields = []) 
    {
        if(!empty($arPriceFields)) 
        {
            self::SetRatio($arPriceFields["PRODUCT_ID"]);
        }
    }

    public static function SetRatio($intProductID) 
    {
        $db_prop = \CIBlockElement::GetProperty(self::CATALOG_IBLOCK_ID, $intProductID, array("sort" => "asc"), Array("CODE"=>"CML2_TRAITS"));

        $intNewRatio = 1;
        while ($arRes = $db_prop->Fetch()) 
        {
            if($arRes["DESCRIPTION"] == "Кратность") 
            {
                $intNewRatio  = $arRes["VALUE"];
                break;
            }
        }

        $db_measure = \CCatalogMeasureRatio::getList(array(), $arFilter = array('PRODUCT_ID' => $intProductID), false, false); 
        while($ar_measure = $db_measure->Fetch()) 
        {
            \CCatalogMeasureRatio::update($ar_measure['ID'], array("RATIO" => $intNewRatio));  
        }
    }
}