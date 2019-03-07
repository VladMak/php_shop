<?php
/*
Основные функции
*/

/**
 * Формирование запрашиваемой страницы
 * @param type $smarty
 * @param type $controllerName
 * @param type $actionName
 */
function loadPage($smarty, $controllerName, $actionName = 'index', $db)
{
	//Подключаем контроллер
	include_once PathPrefix . $controllerName . PathPostfix;
        
	//Формируем название функции и вызываем ее
	$function = $actionName . 'Action';
	$function($smarty, $db);
}

/**
 * Загрузка шаблона
 * @param type $smarty
 * @param type $templateName
 */
function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}

/**
 * Функция отладки. Останавливает работу программы, выводя значение переменной
 * @param type $value
 * @param type $die
 */
function d($value = null, $die = 1){
    echo 'Debug: <br/><pre>';
    print_r($value);
    echo '</pre>';

    if($die) die;
}
