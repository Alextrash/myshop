<?php

//константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

//используемый графический шаблон (по умолчанию - default)
$template = 'default';

//определяем пути для обращения к графическим шаблонам (файлы *.tpl)
define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

//путь к шаблонам в веб-пространстве
define('TemplateWebPath', "/templates/{$template}/");

//инициализация шаблонизатора Smarty
//полный путь к Smarty.class.php
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);