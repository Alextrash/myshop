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