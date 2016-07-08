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
function indexAction($smarty){
    $rsCategories = getAllMainCatsWithChildren();
   
    $smarty->assign('pageTitle', 'Главная страница');

    loadTemplate($smarty, 'header');
   // loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}