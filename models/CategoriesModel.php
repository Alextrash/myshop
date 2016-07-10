<?php
/**
 * Модель для таблицы категорий
 * */


function getChildrenForCat($catId, $mysqli){
    $sql = "SELECT *
            FROM categories
            WHERE parent_id = '{$catId}'";
    $rs = $mysqli->query($sql);
    return createSmartyRsArray($rs);
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

    while ($row = $rs->fetch_array()) {

        $rsChildren = getChildrenForCat($row['id']);

        if ($rsChildren){
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    };

    return $smartyRs;
}