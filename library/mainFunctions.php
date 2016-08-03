<?php
/**
 * Основные функции контроллера страницы
 */

/**
 * @param $smarty               обект для работы с шаблонизатором
 * @param $mysqli               объект для работы с бд
 * @param $controllerName       имя активного контроллера
 * @param string $actionName    функция описания страницы
 */
function loadPage ($smarty, $mysqli, $controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function($smarty, $mysqli);
}

/**
 * @param $smarty
 * @param $templateName
 */
function loadTemplate($smarty, $templateName){
    $smarty->display($templateName . TemplatePostfix);
}

/**
 * Фунция тестирования переменных
 * @param null $value переменная для исследования (null по умолчанию)
 * @param int $die при 0 - продолжение работы, при 1 - остановка выполнения кода
 */
function d($value = null, $die = 1){
    echo('Debug: <br /><pre>');
    print_r($value);
    echo('</pre>');

    if($die) die;
}

/**
 * Обработка (форматирование) данных из sql-запроса
 * @param type $rs -  необработанный набор данных
 * @param type $mysqli
 * @return boolean false
 *      or array - если даные обработаны
 */
function createSmartyRsArray($rs, $mysqli){
    if( ! $rs) return false;

    $smartyRs = array();
    while($row = $rs->fetch_assoc()){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

/**
 * Редирект
 * @param string $url адрес перенаправления
 */
function redirect($url = "/"){
    header("Location: {$url}");
    exit();
}