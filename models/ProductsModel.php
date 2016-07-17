<?php
/**
 * Модель таблицы продукции
 */

/**
 * @param null $limit   количество выводимых элементов товара на странице
 * @param $mysqli       объект для работы с бд
 * @return array|bool   массив с выборкой товаров
 */
function getLastProducts($limit = null, $mysqli){
    $sql = "SELECT *
            FROM `products`
            ORDER by `id` DESC";
    if ($limit){
        $sql .= " LIMIT {$limit}";
    }

    $rs = $mysqli->query($sql);
    
    return createSmartyRsArray($rs, $mysqli);
}

function getProductsByCat($itemId, $mysqli){
    $itemId = intval($itemId);

    $sql = "SELECT *
            FROM `products`
            WHERE `category_id` = '{$itemId}'
            ORDER by `id` DESC";

    $rs = $mysqli->query($sql);

    return createSmartyRsArray($rs, $mysqli);
}

/**
 * Получение данных о продукте по его iD
 * @param $itemId
 * @param $mysqli
 * @return mixed
 */
function getProductById($itemId, $mysqli){

    $itemId = intval($itemId);
    $sql = "SELECT *
            FROM `products`
            WHERE `id` = '{$itemId}'";

    $rs = $mysqli->query($sql);
    return $rs->fetch_assoc();
}

function getProductsFromArray($itemsIds, $mysqli){

    $strIds = implode($itemsIds, ", ");
    $sql = "SELECT *
            FROM `products`
            WHERE `id` in ({$strIds})";

    $rs = $mysqli->query($sql);

    return createSmartyRsArray($rs, $mysqli);
}