<?php
    use Bitrix\Main\Localization\Loc;
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<form name="form" method="post" action="/rd_component/">
	<label><?=Loc::getMessage("RD_LABEL_TITLE")?></label>
		<input id="plus_days" name="plus_days" required>
    <input type="submit" value="<?=Loc::getMessage("RD_BUT_TITLE")?>"><hr>
</form>
