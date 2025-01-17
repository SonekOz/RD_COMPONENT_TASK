<?php
global $APPLICATION;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рабочий день: компонент");
?>
<?php $APPLICATION->IncludeComponent(
	"osipovak:rd_component",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"RD_FIELD_CODE" => "HOLIDAY_DATE",
		"RD_IBLOCK_ID" => "5",
	)
);?>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>