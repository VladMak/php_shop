<?php

/**
 * Контроллер страницы товара (/product/1)
 */
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формирование страницы продукта
 * @param object $smarty шаблонизатор
 * @param link $db база данных
 */
function indexAction($smarty, $db) {
    $itemId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($itemId == null)
        exit();
    
    //Получить данные продукта
    $rsProduct = getProductById($db, $itemId);
    
    //Получить все категории
    $rsCategories = getAllMainCatsWithChildren($db);
    
    $smarty->assign('pageTitle', $rsProduct['name']);
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
