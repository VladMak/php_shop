<?php

/**
* Контроллер главной страницы
*/

//подключение модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование главной страницы сайта
 * @param type $smarty объект Смарти
 * @param type $db Объект базы данных
 */
function indexAction($smarty, $db)
{
    $rsCategories = getAllMainCatsWithChildren($db);
    $rsProducts = getLastProducts($db, 16);
    
    $smarty->assign('pageTitle', 'Главная страница');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
