<?php

/**
 * Контроллер главной страницы
 */

include_once '../models/CategoriesModel.php';

/**
 * Формирование главной страницы сайта
 * @param $smarty
 * @var TYPE_NAME $rsCategories
 */
function indexAction($smarty, $mysqli){
    $rsCategories = getAllMainCatsWithChildren($mysqli);

    $smarty->assign('pageTitle', 'Главная страница');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
   // loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}