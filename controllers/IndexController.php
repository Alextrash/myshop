<?php

/**
 * Контроллер главной страницы
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование главной страницы сайта
 * @param $smarty
 * @var TYPE_NAME $rsCategories
 *
 */
function indexAction($smarty, $mysqli){

    $rsCategories = getAllMainCatsWithChildren($mysqli);
    $rsProducts = getLastProducts(16, $mysqli);

    $smarty->assign('pageTitle', 'Главная страница');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}