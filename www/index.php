<?php

include_once '../config/config.php'; //инициализация настроек
include_once '../library/mainFunctions.php'; //основные функции

//Определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controlle']) : 'Index';

//определяем с какой функцией будем работать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

//Загружаем определенный контроллер и запускаем его метод
loadPage($controllerName, $actionName);
