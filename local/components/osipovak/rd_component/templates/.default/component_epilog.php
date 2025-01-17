<?php

	use Bitrix\Main\Localization\Loc;
	/** Если количество дней в форме заполнено, то выполняем **/
	if ($_POST['plus_days'])
	{
		if ((int)$_POST['plus_days']) // пытаемся привести значение к числу и если получилось, то выполняем
		{
			$workDays = new PlusDays(htmlspecialcharsbx($_POST['plus_days']), $arResult['HOLIDAYS_DATE_INT']); // создаем экземпляр класса PlusDays
			echo Loc::getMessage("RD_CE_CNT", ['pd' => $_POST['plus_days'], 'wd' => $workDays->plus_days()]); // Выводим нужные нам данные, полученные в методе plus_days класса PlusDays
		}
		else
		{
			echo Loc::getMessage("RD_CE_EXCEPTION"); // Выводим, если в $_POST['plus_days'] хранится не число
		}
	}
	/** -------------------------------------------------------------------------------------------------------- **/