<?php

/**
 * Модель для таблицы продукции (products)
 */

/**
 * Получаем последние добавленные товары
 * @param link $db Ссылка на базу данных
 * @param integer $limit Лимит товаров
 * @return array
 */
function getLastProducts($db, $limit = null) {
    $sql = "SELECT * FROM `products` ORDER BY `id` DESC";

    if ($limit) {
        $sql .= " LIMIT $limit";
    }

    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}

/**
 * Получить продукты категории
 * @param type $db база данных
 * @param type $itemId идентификатор товара
 * @return array массив продуктов
 */
function getProductsByCat($db, $itemId) {
    $itemId = intval($itemId);
    $sql = "SELECT * FROM `products` WHERE `category_id`='$itemId'";

    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}

/**
 * Получить продукт по категории
 * @param type $db база данных
 * @param type $itemId идентификатор товара
 * @return array массив данных продукта
 */
function getProductById($db, $itemId) {
    $itemId = intval($itemId);
    $sql = "SELECT * FROM `products` WHERE `id`='$itemId'";

    $rs = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($rs);
}

/**
 * Получить список продуктов из массива идентификаторов
 * @param type $itemsIds
 * @return type Массив данных продуктов
 */
function getProductsFromArray($db, $itemsIds){
    $strIds = implode($itemsIds, ', ');
    $sql = "SELECT * FROM `products` WHERE `id` IN ($strIds)";

    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}