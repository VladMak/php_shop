<?php

/**
 *  Контроллер страницы категории (/category/1)
 */
//подлкючаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование страницы категории
 * @param object $smarty шаблонизатор
 * @param link $db ссылка на соединение с базой данных
 */
function indexAction($smarty, $db) {
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($catId == null)
        exit();

    $rsCategory = getCatById($db, $catId);
    $rsProducts = null;
    $rsChildCats = null;

    //если главная категория, то показываем дочерние категории
    //иначе показываем товары
    if ($rsCategory['parent_id'] == 0) {
        $rsChildCats = getChildrenForCat($db, $catId);
    } else {
        $rsProducts = getProductsByCat($db, $catId);
    }

    $rsCategories = getAllMainCatsWithChildren($db);

    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);

    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}
