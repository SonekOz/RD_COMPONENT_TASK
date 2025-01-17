<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
	"PARAMETERS" => array(
		"RD_IBLOCK_ID" => array(
			"NAME" => GetMessage("RD_HOLIDAYS_IBLOCK_ID"),
			"TYPE" => "STRING",
		),
		"RD_FIELD_CODE" => array(
			"NAME" => GetMessage("RD_HOLIDAYS_FIELD_CODE"),
			"TYPE" => "STRING",
		),
		"CACHE_TIME" => ["DEFAULT"=>36000000],
	),
);