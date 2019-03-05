<?php

include_once '../config/config.php';
include_once '../library/mainFunctions.php';

//Определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controlle']) : 'Index';

//определяем с какой функцией будем работать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';


loadPage($controllerName, $actionName);
