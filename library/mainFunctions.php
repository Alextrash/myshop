<?php

//фунция загрузки страницы
function loadPage ($controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function();
}