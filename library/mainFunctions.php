<?php
/*
Основные функции
*/

/**
Формирование запрашиваемой страницы
*/

function loadPage($smarty, $controllerName, $actionName = 'index'){
	//Подключаем контроллер
	include_once PathPrefix . $controllerName . PathPostfix;

	//Формируем название функции и вызываем ее
	$function = $actionName . 'Action';
	$function($smarty);
}

/*
Загрузка шаблона
*/

function loadTemplate($smarty, $templateName){
    $smarty->display($templateName . TemplatePostfix);
}
