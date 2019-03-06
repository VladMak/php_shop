<?php

/*
Контроллер главной страницы
*/

/*
Формирование главной страницы сайта
*/
function indexAction($smarty){
    $smarty->assign('pageTitle', 'Главная страница');

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
