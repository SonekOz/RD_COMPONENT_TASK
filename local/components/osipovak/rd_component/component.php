<?php
	global $USER;
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader,
	Bitrix\Iblock;

/**           Подгружаем модуль            **/
if(!Loader::includeModule("iblock"))
{
	ShowError(GetMessage("RD_IBLOCK_MODULE_NONE"));
	return;
}
/** -------------------------------------- **/

if ($this->StartResultCache($arParams['CACHE_TIME'], $USER->GetID())) // Используем встроенный кеш
{
	/** Делаем запрос в бд для получения эл-тов иб "Праздничные дни", приводим к числовому значению даты и записываем в массив $arHolidaysInt, а позже в $arResult**/
	$arHolidays = [];
	$arFilter = [
		"IBLOCK_ID" => $arParams['RD_IBLOCK_ID'],
		"ACTIVE"=>"Y",
		">PROPERTY_".$arParams['RD_FIELD_CODE']."_VALUE" => date("d.m.Y"),
	];
	$arSelect = [
		"PROPERTY_".$arParams["RD_FIELD_CODE"],
	];

	$getHolidaysDates = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

	while ($holiday = $getHolidaysDates->Fetch())
	{
		if (strtotime($holiday["PROPERTY_{$arParams["RD_FIELD_CODE"]}_VALUE"]) > strtotime(date("d.m.Y")))
		{
			$arHolidaysInt[] = strtotime($holiday["PROPERTY_{$arParams["RD_FIELD_CODE"]}_VALUE"]);
		}
		else
		{
			echo False;
		}
	}

	$arResult['HOLIDAYS_DATE_INT'] = $arHolidaysInt;
	/** -------------------------------------------------------------------------------------------------------------------------- **/

	/** Добавляем ключ массива из $arResult, так как нам нужно это закешировать при использовании встроенного кеширования **/
	$this->SetResultCacheKeys(array(
		"HOLIDAYS_DATE_INT"
	));
	/** ----------------------------------------------------------------------------------------------------------------- **/

	$this->includeComponentTemplate(); // подключаем шаблон
} else {
	$this->abortResultCache(); // прерываем кеширование
}