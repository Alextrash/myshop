<?php

/**
 * Контроллер главной страницы

 */

function testAction () {
    echo "IndexController.php > testAction";
}

/**
 * Формирование главной страницы сайта
 * @param $smarty
 *
 */
function indexAction($smarty){
    $smarty->assign('pageTitle', 'Главная страница');

    loadTemplate($smarty, 'index');
}