<?php
/*
Файл настроек
*/ 
//Корень сайта
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
//Показывать ошибки
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

//Используемый шаблон
$template = 'default';

//пути к файлам шаблонов (*.tpl)
define('TemplatePrefix', "/views/$template/");
define('TemplatePostfix', '.tpl');

//пути к файлам шаблонов в вебпространстве
define('TemplateWebPath', "/templates/$template/");

//Инициализация шаблонизатора Smarty
// put full path to Smarty.class.php
require(ROOT . '/library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(ROOT . TemplatePrefix);
$smarty->setCompileDir(ROOT . '/tmp/smarty/templates_c');
$smarty->setCacheDir(ROOT . '/tmp/smarty/cache');
$smarty->setConfigDir(ROOT . '/library/Smarty/configs');

//$smarty->debugging = true;

$smarty->assign('templateWebPath', TemplateWebPath);
