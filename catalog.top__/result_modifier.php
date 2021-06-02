<?php
/**
 * @author Pavel Nikitin <pavelykt86@gmail.com>
 * @company Itex <www.itexweb.ru>
 * Date: 05.05.2016
 * Time: 13:25
 *
 * @var CMain $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (!empty($arResult)) {
   /* foreach ($arResult as $k => $arItem) {
        //if($arItem['DEPTH_LEVEL'] != 1) continue;
        $count = 0;
        
        $arFilter = Array('IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'], 'IBLOCK_ID' => $arParams['IBLOCK_ID'], 'SECTION_ID' => $arItem['PARAMS']['SECTION_ID']);
        $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
        while($ar_result = $db_list->GetNext())
        {
            $count++;
        }
        $arResult[$k]['COUNT_ITEMS'] = $count;
        
        $arSect = CIBlockSection::GetList(
            array(),
            array('IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'], 'IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $arItem['PARAMS']['SECTION_ID']),
            array(),
            array('UF_DOP_NAME')
        )->Fetch();
            
        
        $arResult[$k]['DOP_TEXT'] = $arSect['UF_DOP_NAME'];
    }
	*/
	$arSections = array();
	foreach ($arResult as $k => $arItem) 
	{
		if($arItem['DEPTH_LEVEL'] == 1)
		{
			$arSections[$arItem['PARAMS']['SECTION_ID']] = $arItem['PARAMS']['SECTION_ID'];
		}
		
	}
	$arCounts = array();
	$arDops = array();
	if(!empty($arSections))
	{
		$arFilterCountChlildrens = array('IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'], 'IBLOCK_ID' => $arParams['IBLOCK_ID'], 'SECTION_ID' => $arSections);
		$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilterCountChlildrens, false,array("ID","IBLOCK_SECTION_ID","IBLOCK_ID"));
		while($ar_result = $db_list->Fetch())
        {
           if(!$arCounts[$ar_result["IBLOCK_SECTION_ID"]])
		   {
				$arCounts[$ar_result["IBLOCK_SECTION_ID"]] = 1;
		   }
		   else
		   {
			   $arCounts[$ar_result["IBLOCK_SECTION_ID"]]++;
		   }
        }
		$arFilterDops = array('IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'], 'IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $arSections);
		$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilterDops, false,array("ID","IBLOCK_SECTION_ID","IBLOCK_ID","UF_DOP_NAME"));
		while($ar_result = $db_list->Fetch())
		{
			if($ar_result['UF_DOP_NAME'])
			{
				$arDops[$ar_result["ID"]] = $ar_result['UF_DOP_NAME'];
			}
		}
	}
	foreach ($arResult as $k => $arItem) 
	{
		if($arItem['PARAMS']['SECTION_ID'])
		{
			$arResult[$k]['DOP_TEXT'] = $arDops[$arItem['PARAMS']['SECTION_ID']];
			$arResult[$k]['COUNT_ITEMS'] = $arCounts[$arItem['PARAMS']['SECTION_ID']];
		}
	}

	$BANNER_PRODUCT = [];

    $arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => 2, "!PROPERTY_SHOW_MAIN_MENU" => false);
    $res = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        if ($arFields['PREVIEW_PICTURE'])
        {
            $thumbPicture = CFile::ResizeImageGet(
                $arFields['PREVIEW_PICTURE'],
                array('width' => 321, 'height' => 268),
                BX_RESIZE_IMAGE_EXACT,false,false,false,100
            );
            $BANNER_PRODUCT = [
                "PICTURE"           => $thumbPicture,
                "NAME"              => $arFields['NAME'],
                "DETAIL_PAGE_URL"   => $arFields['DETAIL_PAGE_URL'],
            ];
        }
    }

    $arResult['BANNER_PRODUCT'] = $BANNER_PRODUCT;
}
