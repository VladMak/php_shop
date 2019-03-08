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

function getProductsByCat($db, $itemId) {
    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE category_id='$itemId'";

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}
