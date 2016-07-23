<?php
/**
 * Модель для таблицы категорий
 * */

/**
 * Функция отлова детей родительской категории
 *
 * @param $catId id главной (родительской категории), для которой ищем детей
 * @param $mysqli объект для работы с базой данных
 * @return array|bool массив с детьми категории
 */
function getChildrenForCat($catId, $mysqli){
    $sql = "SELECT *
            FROM categories
            WHERE parent_id = '{$catId}'";
    $rs = $mysqli->query($sql);

    return createSmartyRsArray($rs, $mysqli);
}

/**
 * Вывод списка категорий в главном меню
 *
 * @param $mysqli объект для работы с базой данных
 * @return array массив с выборкой родительских категорий товаров
 */
function getAllMainCatsWithChildren($mysqli){
    $sql = 'SELECT *
            FROM categories
            WHERE parent_id = 0;';
    $rs =  $mysqli->query($sql);

    $smartyRs = array();

    while ($row = $rs->fetch_assoc()) {

        $rsChildren = getChildrenForCat($row['id'], $mysqli);

        if ($rsChildren){
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }
    return $smartyRs;
}

/**
 * @param $catId    id категории
 * @param $mysqli
 * @return mixed    массив - строка категории
 */
function getCategoryById($catId, $mysqli){
    $catId = intval($catId);

    $sql = "SELECT *
            FROM categories
            WHERE
            id = '{$catId}'";

    $rs = $mysqli->query($sql);

    return $rs->fetch_assoc();
}