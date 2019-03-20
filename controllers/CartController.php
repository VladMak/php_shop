<?php

/**
 * Контроллер работы с корзиной (/cart/)
 */
//Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Добавление продукта в корзину
 * 
 * @param integer $id id GET параметр - идентификатор добавляемого продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function addtocartAction() {
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;

    if (!$itemId)
        return false;

    $resData = array();

    //если нужно добавить несколько товаров за раз, то убрать array_search
    //и в main.js убрать сокрытие поля
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        array_push($_SESSION['cart'], $itemId);
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }

    echo json_encode($resData);
}

/**
 * Удаление продукта из корзины
 * 
 * @param integer id GET параметр - ID удаленного из корзины продукта
 * @return json Информация об операции(Успех, кол-во элементов в корзине)
 */
function removefromcartAction() {
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;

    if (!$itemId)
        exit();

    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}

/**
 * Формирование страницы корзины
 * @param type $smarty объект Смарти
 * @param type $db соединение с базой данных
 */
function indexAction($smarty, $db){
    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    $rsCategories = getAllMainCatsWithChildren($db);
    $rsProducts = getProductsFromArray($db, $itemIds);
    
    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}