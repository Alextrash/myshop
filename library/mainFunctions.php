<?php

/**
 * фунция загрузки страницы
 *
 * @param $controllerName название контроллера
 * @param string $actionName функция описания страницы
 */
function loadPage ($controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function();
}