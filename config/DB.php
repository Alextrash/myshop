<?php
/**
 *
 * Инициализация подключения к БД
 */

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

$mysqli = new Mysqli($dblocation, $dbuser, $dbpasswd, $dbname);
$mysqli->set_charset('utf8');

if ($mysqli->connect_errno){
    echo "Ошибка соединения с MySQL: " . $mysqli->connect_error;
    exit();
}

