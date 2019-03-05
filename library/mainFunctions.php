<?php

function loadPage($controllerName, $actionName = 'index'){
	//Подключаем контроллер
	include_once PathPrefix .$controllerName . PathPostfix;

	//Формируем название функции и вызываем ее
	$function = $actionName . 'Action';
	$function();
}
