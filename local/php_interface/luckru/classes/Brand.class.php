<?php
namespace Luckru\Catalog;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("Luckru\Catalog\Brand", "OnAfterIBlockElementUpdateHandler"));

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("Luckru\Catalog\Brand", "OnAfterIBlockElementUpdateHandler"));

class Brand
{
    const BRAND_IBLOCK_ID = 33;

    const CATALOG_IBLOCK_ID = 38;

    const BRAND_PROP_ID = 695;

    public static function OnAfterIBlockElementUpdateHandler(&$arFields) 
    {
        if($arFields["IBLOCK_ID"] == self::CATALOG_IBLOCK_ID) 
        {
            //echo "<pre>"; print_r($arFields); echo "</pre>"; exit;
            $strOneCBrand = self::GetOneCBrand($arFields["ID"]);

            if(empty($strOneCBrand)) 
            {
                return;
            }

            $arBrand = self::GetBrandByName($strOneCBrand);

            if($arBrand != false) 
            {
                \CIBlockElement::SetPropertyValueCode($arFields["ID"], "BRAND", $arBrand["ID"]);
            }
            else 
            {
                $intNewBrandID = self::CreateNewBrand($strOneCBrand);

                \CIBlockElement::SetPropertyValueCode($arFields["ID"], "BRAND", $intNewBrandID);
            }
        }
    }

    private static function GetOneCBrand($intElID) 
    {
        $dbRes = \CIBlockElement::GetProperty(self::CATALOG_IBLOCK_ID, $intElID, "sort", "asc", array("CODE" => "PROIZVODITEL"));
        $strOneCBrand = $dbRes->Fetch()["VALUE"];

        return $strOneCBrand;
    }

    public static function GetBrandByName($strBrandName) 
    {
        $db_res = \CIBlockElement::GetList([], [
            "IBLOCK_ID" => self::BRAND_IBLOCK_ID,
            "?NAME" => mb_strtoupper($strBrandName),
        ], false, false, [
            "ID", "NAME"
        ]);

        $ar_res = $db_res->Fetch();

        return $ar_res;
    }

    public static function CreateNewBrand($strBrandName) 
    {
        $el = new \CIBlockElement;

        $arProps = [];

        $arTranslitParams = array("replace_space"=>"-","replace_other"=>"-");
        $strCode = \Cutil::translit($strBrandName,"ru",$arTranslitParams);

        $arLoadElementArray = 
        [
            "IBLOCK_ID"       => self::BRAND_IBLOCK_ID,
            "PROPERTY_VALUES" => $arProps,
            "NAME"            => $strBrandName,
            "CODE"            => $strCode,
            "ACTIVE"          => "N",
        ];

        $intNewBrandID = $el->Add($arLoadElementArray); 

        /*
        \CEvent::Send("NEW_BRAND", 's1', [
            'EMAIL' => "dp@luckru.ru",
            'BRAND_NAME' => $strBrandName,
        ]);
        */

        return $intNewBrandID;
    }

    public static function FullInstall() 
    {
        $db_res = \CIBlockElement::GetList([], [
            "IBLOCK_ID" => self::CATALOG_IBLOCK_ID,
        ], false, false, [
            "ID", "NAME", "PROPERTY_PROIZVODITEL", "PROPERTY_BRAND"
        ]);

        $arResult = [];
        while($ar_res = $db_res->Fetch()) 
        {
            if(empty($ar_res["PROPERTY_BRAND_VALUE"]) && !empty($ar_res["PROPERTY_PROIZVODITEL_VALUE"])) 
            {
                $arResult[] = $ar_res;

                self::SetBrand($ar_res["ID"], $ar_res["PROPERTY_PROIZVODITEL_VALUE"]);
            }
        }

        echo "<pre>"; print_r($arResult); echo "</pre>";
    }

    private static function SetBrand($intElID, $strOneCBrand) 
    {
        if(empty($strOneCBrand) || empty($intElID)) 
        {
            return;
        }

        $arBrand = self::GetBrandByName($strOneCBrand);

        if($arBrand != false) 
        {
            \CIBlockElement::SetPropertyValueCode($intElID, "BRAND", $arBrand["ID"]);
        }
        else 
        {
            $intNewBrandID = self::CreateNewBrand($strOneCBrand);

            \CIBlockElement::SetPropertyValueCode($intElID, "BRAND", $intNewBrandID);
        }
    }

    public static function Check() 
    {
        $db_res = \CIBlockElement::GetList([], [
            "IBLOCK_ID" => self::CATALOG_IBLOCK_ID,
        ], false, false, [
            "ID", "NAME", "PROPERTY_PROIZVODITEL", "PROPERTY_BRAND"
        ]);

        $arResult = [];
        while($ar_res = $db_res->Fetch()) 
        {
            if(!empty($ar_res["PROPERTY_PROIZVODITEL_VALUE"])) 
            {
                $arResult[] = $ar_res;
            }
        }

        echo "<pre>"; print_r($arResult); echo "</pre>";
    }
}